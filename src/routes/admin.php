<?php

use App\Http\Controllers\Admin\CertificatesController;
use App\Http\Controllers\Admin\DataCentersController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PostsController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Users
    Route::resource('users', UsersController::class)->except(['destroy', 'show']);
    Route::get('users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');

    // Slider
    Route::resource('slider', SliderController::class)->except(['destroy', 'show']);
    Route::get('slider/{id}/delete', [SliderController::class, 'delete'])->name('slider.delete');

    // Pages
    Route::resource('pages', PagesController::class)->except(['show']);
    Route::post('pages/updateNestable', [PagesController::class, 'updateNestable'])->name('pages.update-nestable')->middleware('xhr-request');

    Route::resource('product-category', ProductCategoryController::class)->except(['show']);
    Route::get('product-category/{id}/delete', [ProductCategoryController::class, 'delete'])->name('product-category.delete');

    // Posts
    Route::resource('posts', PostsController::class)->except(['destroy', 'show']);
    Route::get('posts/{id}/delete', [PostsController::class, 'delete'])->name('posts.delete');

    // Partners
    Route::resource('partners', PartnersController::class)->except(['destroy', 'show']);
    Route::get('partners/{id}/delete', [PartnersController::class, 'delete'])->name('partners.delete');

    Route::resource('certificates', CertificatesController::class)->except(['destroy', 'show']);
    Route::get('certificates/{id}/delete', [CertificatesController::class, 'delete'])->name('certificates.delete');

    // Data centers
    Route::resource('data-centers', DataCentersController::class)->except(['destroy', 'show']);
    Route::get('data-centers/{id}/delete', [DataCentersController::class, 'delete'])->name('data-centers.delete');

    // Tags
    Route::get('tags/list', [TagsController::class, 'list'])->name('tags.list')->middleware('xhr-request');

    // Media
    Route::post('media/delete', [MediaController::class, 'delete'])->name('media.delete');

    // Settings
    Route::resource('settings', SettingsController::class)->except(['destroy', 'show']);

    // Newsletter
    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::get('newsletter/{id}/delete', [NewsletterController::class, 'delete'])->name('newsletter.delete');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
