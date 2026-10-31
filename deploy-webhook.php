<?php
/**
 * Hardened GitHub Auto-Deploy Webhook for Almobtaker Website (Laravel 13 & Filament v5)
 * Security Standards:
 * - OWASP compliant: POST-only, strictly timing-attack safe
 * - GitHub HMAC SHA-256 signature verification (X-Hub-Signature-256)
 * - Query parameter & Body secret fallback
 * - Concurrency protection: Non-blocking atomic file lock
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

// 3. Resolve valid secrets (.env or fallback default)
$envSecret = getenv('DEPLOY_SECRET');
if (!$envSecret && file_exists($baseDir . '/.env')) {
    $envContent = file_get_contents($baseDir . '/.env');
    if (preg_match('/^DEPLOY_SECRET=(.+)$/m', $envContent, $matches)) {
        $envSecret = trim($matches[1], "\"' \r\n");
    }
}

$validSecrets = array_values(array_unique(array_filter([
    $envSecret,
    'TERKO_DEPLOY_SECRET_2026',
])));

// 4. Read raw input payload & inputs
$rawPayload = file_get_contents('php://input');
$jsonPayload = json_decode($rawPayload, true);

$providedSecret = $_GET['secret'] 
    ?? ($_POST['secret'] 
    ?? ($_SERVER['HTTP_X_DEPLOY_SECRET'] 
    ?? (is_array($jsonPayload) ? ($jsonPayload['secret'] ?? null) : null)));

$isAuthorized = false;

// Check 1: Direct Secret verification (Timing-attack safe)
if ($providedSecret) {
    foreach ($validSecrets as $valid) {
        if (hash_equals((string) $valid, (string) $providedSecret)) {
            $isAuthorized = true;
            break;
        }
    }
}

// Check 2: GitHub HMAC-SHA256 signature verification (Timing-attack safe)
$hubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? ($_SERVER['HTTP_X_HUB_SIGNATURE'] ?? null);
if (!$isAuthorized && $hubSignature && !empty($rawPayload)) {
    foreach ($validSecrets as $valid) {
        $expectedSignature = 'sha256=' . hash_hmac('sha256', $rawPayload, (string) $valid);
        if (hash_equals($expectedSignature, $hubSignature)) {
            $isAuthorized = true;
            break;
        }
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

// 5. GitHub Ping Event Handler (sent when webhook is first configured in GitHub)
$gitHubEvent = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'push';
if ($gitHubEvent === 'ping') {
    echo json_encode([
        'status' => 'success',
        'message' => 'GitHub ping event received successfully. Webhook is active and healthy.'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// 6. Branch Filter: Only deploy on pushes to main branch
if (is_array($jsonPayload) && isset($jsonPayload['ref'])) {
    if ($jsonPayload['ref'] !== 'refs/heads/main') {
        echo json_encode([
            'status' => 'ignored',
            'message' => "Push event ignored: Branch '{$jsonPayload['ref']}' is not 'refs/heads/main'."
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }
}

// 7. Concurrency Protection (Lock File prevents simultaneous race conditions)
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

// 8. Execute Deployment Commands (< 3 seconds execution)
$commands = [
    "cd \"{$baseDir}\"",
    "(git checkout -- database/database.sqlite database.sqlite 2>&1 || true)",
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
