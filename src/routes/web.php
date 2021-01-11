<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PostsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->name('site.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Blog
    Route::get('blog', [PostsController::class, 'index'])->name('blog');
    Route::get('blog/{slug}', [PostsController::class, 'show'])->name('blog.show');
});