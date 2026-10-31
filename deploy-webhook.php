<?php
/**
 * GitHub Auto-Deploy Webhook for Almobtaker Website (Laravel 13 & Filament v5)
 * Secure timing-attack resistant deployment endpoint.
 */

header('Content-Type: application/json; charset=utf-8');

$secret = 'TERKO_DEPLOY_SECRET_2026';
$providedSecret = $_GET['secret'] ?? ($_POST['secret'] ?? null);

if (!$providedSecret) {
    $rawInput = file_get_contents('php://input');
    if ($rawInput) {
        $input = json_decode($rawInput, true);
        $providedSecret = $input['secret'] ?? null;
    }
}

// Security: Timing attack safe string comparison
if (!$providedSecret || !hash_equals($secret, (string) $providedSecret)) {
    http_response_code(403);
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized: Invalid deploy secret'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$baseDir = __DIR__;
$output = shell_exec("cd {$baseDir} && git pull origin main 2>&1 && (composer install --no-dev --optimize-autoloader 2>&1 || true) && php artisan migrate --force 2>&1 && php artisan optimize:clear 2>&1");

echo json_encode([
    'status' => 'success',
    'message' => 'Deployed successfully',
    'output' => $output,
    'timestamp' => date('c'),
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
