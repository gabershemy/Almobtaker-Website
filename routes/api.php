<?php

use App\Http\Controllers\Api\DeployWebhookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Almobtaker Alaraby
|--------------------------------------------------------------------------
*/

// GitHub Auto-Deploy Webhook API Endpoint (OWASP Compliant + Rate-Limited)
Route::post('/deploy-webhook', DeployWebhookController::class)
    ->middleware('throttle:6,1')
    ->name('api.deploy.webhook');
