<?php
/**
 * Contact Form API Endpoint
 * Protected by ContactService with rate limiting, sanitization, and spam honeypot
 */

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'طريقة الطلب غير مسموح بها (Method Not Allowed)'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$contactService = new \App\Services\ContactService();
$result = $contactService->handleSubmission($_POST);

http_response_code($result['code'] ?? 200);
echo json_encode([
    'success' => $result['success'],
    'message' => $result['message']
], JSON_UNESCAPED_UNICODE);