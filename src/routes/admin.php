<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Users
    Route::resource('users', UsersController::class)->except(['destroy', 'show']);
    Route::get('users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');

    // Posts
    Route::resource('posts', PostsController::class)->except(['destroy', 'show']);
    Route::get('posts/{id}/delete', [PostsController::class, 'delete'])->name('posts.delete');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
