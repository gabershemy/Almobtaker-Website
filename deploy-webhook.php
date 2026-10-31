<?php
/**
 * GitHub Auto-Deploy Webhook for Almobtaker Website (Laravel 13 & Filament v5)
 * Timing-attack resistant deployment endpoint supporting:
 * 1. Query parameter: ?secret=TERKO_DEPLOY_SECRET_2026
 * 2. POST parameter: secret=TERKO_DEPLOY_SECRET_2026
 * 3. JSON body: {"secret": "TERKO_DEPLOY_SECRET_2026"}
 * 4. GitHub HMAC-SHA256 Header: X-Hub-Signature-256
 */

header('Content-Type: application/json; charset=utf-8');

// Fast response: Avoid PHP script timeout
@set_time_limit(120);

$secret = getenv('DEPLOY_SECRET') ?: 'TERKO_DEPLOY_SECRET_2026';
$rawInput = file_get_contents('php://input');

$providedSecret = $_GET['secret'] ?? ($_POST['secret'] ?? null);
if (!$providedSecret && $rawInput) {
    $input = json_decode($rawInput, true);
    if (is_array($input)) {
        $providedSecret = $input['secret'] ?? null;
    }
}

$isAuthorized = false;

// 1. Direct Secret verification (Timing-attack safe)
if ($providedSecret && hash_equals($secret, (string) $providedSecret)) {
    $isAuthorized = true;
}

// 2. GitHub HMAC-SHA256 signature verification (Timing-attack safe)
$hubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? ($_SERVER['HTTP_X_HUB_SIGNATURE'] ?? null);
if (!$isAuthorized && $hubSignature && $rawInput) {
    $expectedSignature = 'sha256=' . hash_hmac('sha256', $rawInput, $secret);
    if (hash_equals($expectedSignature, $hubSignature)) {
        $isAuthorized = true;
    }
}

if (!$isAuthorized) {
    http_response_code(403);
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized: Invalid deploy secret or webhook signature'
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// Resolve project base directory reliably
$baseDir = __DIR__;
if (!is_dir($baseDir . '/.git') && is_dir(dirname($baseDir) . '/.git')) {
    $baseDir = dirname($baseDir);
}

// Fast & robust deployment commands (< 5 seconds)
$commands = [
    "cd \"{$baseDir}\"",
    "git pull origin main 2>&1",
    "php artisan migrate --force 2>&1",
    "php artisan optimize:clear 2>&1"
];

$commandStr = implode(' && ', $commands);
$output = shell_exec($commandStr);

echo json_encode([
    'status' => 'success',
    'message' => 'Deployment executed successfully',
    'project_path' => $baseDir,
    'output' => $output,
    'timestamp' => date('c'),
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
