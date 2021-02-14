<?php

use App\Http\Controllers\Admin\CertificatesController;
use App\Http\Controllers\Admin\DataCentersController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ServicesController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Users
    Route::resource('users', UsersController::class)->except(['destroy', 'show']);
    Route::get('users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');

    // Pages
    Route::resource('pages', PagesController::class)->except(['destroy', 'show']);
    Route::get('pages/{id}/delete', [PagesController::class, 'delete'])->name('pages.delete');

    // Posts
    Route::resource('posts', PostsController::class)->except(['destroy', 'show']);
    Route::get('posts/{id}/delete', [PostsController::class, 'delete'])->name('posts.delete');

    // Partners
    Route::resource('partners', PartnersController::class)->except(['destroy', 'show']);
    Route::get('partners/{id}/delete', [PartnersController::class, 'delete'])->name('partners.delete');

    Route::resource('certificates', CertificatesController::class)->except(['destroy', 'show']);
    Route::get('certificates/{id}/delete', [CertificatesController::class, 'delete'])->name('certificates.delete');

    // Services
    Route::resource('services', ServicesController::class)->except(['destroy', 'show']);
    Route::get('services/{id}/delete', [ServicesController::class, 'delete'])->name('services.delete');

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
