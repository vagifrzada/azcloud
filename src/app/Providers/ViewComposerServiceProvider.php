<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::share('supportedLocales', LaravelLocalization::getSupportedLocales());
        View::share('currentLocale', $this->app->getLocale());
    }
}