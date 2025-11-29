<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| FULLOBSTER - Company Profile Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Contact Form
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');