<?php

namespace App\Providers;

use App\Entities\Menu\Menu;
use App\Entities\MenuItem\MenuItem;
use App\Entities\Product\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::share('supportedLocales', LaravelLocalization::getSupportedLocales());
        View::share('currentLocale', $this->app->getLocale());
        View::composer(['layouts.site'], function (\Illuminate\View\View $view) {
            $view->with('menu', Cache::rememberForever('site_menu', function () {
                return Menu::query()->oldest('order')->where('status', true)->get();
            }));

            $view->with('menuItems', Cache::rememberForever('site_menu_items', function () {
                return MenuItem::query()->oldest('order')->where('status', true)->get();
            }));

            $view->with('footerProducts', Cache::rememberForever('site_footer_products', function () {
                return Product::query()->where('status', true)->where('parent_id', 0)->get();
            }));
        });
    }
}