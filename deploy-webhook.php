<?php
// ─────────────────────────────────────────────────────────────────────────────
// GitHub Auto-Deploy Webhook for Almobtaker Website
// ─────────────────────────────────────────────────────────────────────────────
header('Content-Type: application/json; charset=utf-8');

$secret = 'TERKO_DEPLOY_SECRET_2026';
$providedSecret = $_GET['secret'] ?? ($_POST['secret'] ?? null);

if (!$providedSecret) {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $providedSecret = $input['secret'] ?? null;
}

if ($providedSecret !== $secret) {
    http_response_code(403);
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized: Invalid deploy secret'
    ]);
    exit;
}

$baseDir = __DIR__;
$output = shell_exec("cd {$baseDir} && git pull origin main 2>&1");

echo json_encode([
    'status' => 'success',
    'message' => 'Deployed successfully',
    'output' => $output,
    'timestamp' => date('c'),
]);
