<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// Route to show the login form
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('login');

// Route to handle the login action
Route::post('/admin/login', [AuthController::class, 'login']);

// Route to handle logout action
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Grouping routes that require authentication
Route::middleware(['auth:sanctum'])->group(function () {
    // Dashboard route
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes for sending messages
    Route::get('/admin/send-message', [MessageController::class, 'create'])->name('message.create');
    Route::post('/admin/send-message', [MessageController::class, 'store'])->name('message.store');

    // Route for viewing message history
    Route::get('/admin/message-history', [MessageController::class, 'index'])->name('message.history');
});
