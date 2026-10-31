<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Almobtaker Alaraby
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rate-limited contact inquiry endpoints (Security: Anti-Spam / Anti-DDoS)
Route::post('/api/inquiries', [HomeController::class, 'submitInquiry'])
    ->middleware('throttle:10,1')
    ->name('inquiries.submit');

Route::match(['post', 'get'], '/api/contact.php', [HomeController::class, 'submitInquiry'])
    ->middleware('throttle:10,1');

// Hardened GitHub Auto-Deploy Webhook Endpoint (POST Only + Rate-limited)
Route::post('/deploy-webhook', \App\Http\Controllers\Api\DeployWebhookController::class)
    ->middleware('throttle:6,1')
    ->name('deploy.webhook');
