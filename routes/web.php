<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/api/inquiries', [HomeController::class, 'submitInquiry'])->name('inquiries.submit');
Route::match(['post', 'get'], '/api/contact.php', [HomeController::class, 'submitInquiry']);
