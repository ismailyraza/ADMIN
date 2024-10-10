<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\PostController;
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

    // Phases routes
    Route::get('/admin/phases', [PhaseController::class, 'index'])->name('phases.index');
    Route::get('/admin/phases/{phase_id}', [PhaseController::class, 'show'])->name('phases.show');

    // Routes for Posts (restricted to admin)
    Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');

    // Route to show the edit form for a post
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Route to update a post
    Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    // Route to delete a post
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
