<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\TagsController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\PostsController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\ProductsController;
use App\Http\Controllers\Site\PartnershipController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->name('site.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('partnership', [PartnershipController::class, 'index'])->name('partnership');

    Route::get('search', [SearchController::class, 'search'])->name('search');

    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact', [ContactController::class, 'contact'])->name('contact.send');
    Route::post('newsletter', [ContactController::class, 'newsletter'])
        ->name('newsletter')->middleware('throttle:3,10');

    // Products
    Route::get('services', [ProductsController::class, 'index'])->name('products');
    Route::get('services/{category}/{slug}', [ProductsController::class, 'show'])->name('products.show');

    // Blog
    Route::get('blog', [PostsController::class, 'index'])->name('blog');
    Route::get('blog/list', [PostsController::class, 'list'])->name('blog.list.xhr')->middleware('xhr-request');
    Route::get('blog/{slug}', [PostsController::class, 'show'])->name('blog.show');

    // Tag
    Route::get('blog/tag/{slug}', [TagsController::class, 'show'])->name('blog.tags.show');
});