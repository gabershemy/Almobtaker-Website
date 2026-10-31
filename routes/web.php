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
