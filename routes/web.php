<?php

use App\Http\Controllers\UserController;
use App\Models\Sample;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/store-user', [UserController::class, 'store'])->name('store-user');

require __DIR__.'/auth.php';
