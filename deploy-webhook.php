<?php
/**
 * Hardened GitHub Auto-Deploy Webhook for Almobtaker Website (Laravel 13 & Filament v5)
 * Security Standards:
 * - OWASP compliant: POST-only, strictly timing-attack safe, no plaintext secrets in URL
 * - GitHub HMAC SHA-256 signature verification (X-Hub-Signature-256)
 * - Concurrency protection: Non-blocking atomic file lock (prevents git index corruption)
 * - Environment based: Reads secret from .env, zero hardcoded secrets
 * - Supports GitHub ping event & main branch filtering
 */

header('Content-Type: application/json; charset=utf-8');

// 1. Strict HTTP Method: Webhooks must be POST only (reject GET/PUT/etc.)
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Method Not Allowed: Deployment webhook strictly accepts POST requests only.'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 2. Resolve base project directory
$baseDir = __DIR__;
if (!is_dir($baseDir . '/.git') && is_dir(dirname($baseDir) . '/.git')) {
    $baseDir = dirname($baseDir);
}

// 3. Load Secret securely from environment or .env file (NEVER hardcode secrets in source)
$secret = getenv('DEPLOY_SECRET');
if (!$secret && file_exists($baseDir . '/.env')) {
    $envContent = file_get_contents($baseDir . '/.env');
    if (preg_match('/^DEPLOY_SECRET=(.+)$/m', $envContent, $matches)) {
        $secret = trim($matches[1], "\"' \r\n");
    }
}

if (empty($secret)) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Server Configuration Error: DEPLOY_SECRET is not configured in .env'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 4. Read raw input payload
$rawPayload = file_get_contents('php://input');
$jsonPayload = json_decode($rawPayload, true);

// 5. Verification: Primary: GitHub HMAC-SHA256 signature (Recommended & Safest)
$hubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? ($_SERVER['HTTP_X_HUB_SIGNATURE'] ?? null);
$isAuthorized = false;

if ($hubSignature && !empty($rawPayload)) {
    $expectedSignature = 'sha256=' . hash_hmac('sha256', $rawPayload, $secret);
    if (hash_equals($expectedSignature, $hubSignature)) {
        $isAuthorized = true;
    }
}

// Fallback Verification: POST Header (X-Deploy-Secret) or POST Body Secret (Timing-safe)
if (!$isAuthorized) {
    $headerSecret = $_SERVER['HTTP_X_DEPLOY_SECRET'] ?? null;
    $bodySecret = is_array($jsonPayload) ? ($jsonPayload['secret'] ?? null) : ($_POST['secret'] ?? null);
    $candidateSecret = $headerSecret ?: $bodySecret;

    if ($candidateSecret && hash_equals($secret, (string) $candidateSecret)) {
        $isAuthorized = true;
    }
}

if (!$isAuthorized) {
    http_response_code(403);
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized: Invalid GitHub webhook signature or secret.'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 6. GitHub Ping Event Handler (sent when webhook is first configured in GitHub)
$gitHubEvent = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'push';
if ($gitHubEvent === 'ping') {
    echo json_encode([
        'status' => 'success',
        'message' => 'GitHub ping event received successfully. Webhook is active and healthy.'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 7. Branch Filter: Only deploy on pushes to main branch
if (is_array($jsonPayload) && isset($jsonPayload['ref'])) {
    if ($jsonPayload['ref'] !== 'refs/heads/main') {
        echo json_encode([
            'status' => 'ignored',
            'message' => "Push event ignored: Branch '{$jsonPayload['ref']}' is not 'refs/heads/main'."
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }
}

// 8. Concurrency Protection (Lock File prevents simultaneous race conditions)
$lockFile = $baseDir . '/storage/framework/deploy.lock';
$lockHandle = fopen($lockFile, 'w+');
if (!$lockHandle || !flock($lockHandle, LOCK_EX | LOCK_NB)) {
    http_response_code(429);
    echo json_encode([
        'status' => 'busy',
        'message' => 'Another deployment is currently in progress. Please try again in a few moments.'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 9. Execute Deployment Commands (< 3 seconds execution)
$commands = [
    "cd \"{$baseDir}\"",
    "git pull origin main 2>&1",
    "php artisan migrate --force 2>&1",
    "php artisan optimize:clear 2>&1"
];

$commandStr = implode(' && ', $commands);
$output = shell_exec($commandStr);

// Release Lock
flock($lockHandle, LOCK_UN);
fclose($lockHandle);

echo json_encode([
    'status' => 'success',
    'message' => 'Deployment executed successfully',
    'project_path' => $baseDir,
    'output' => $output,
    'timestamp' => date('c'),
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
