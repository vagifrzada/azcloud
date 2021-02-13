<?php

namespace App\Providers;

use App\Plugins\Page\Plugin;
use Psr\Container\ContainerInterface;
use App\Plugins\Page\PagePlugin;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\PageRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PagePlugin::class, function (ContainerInterface $container) {
            return new Plugin($container->get(PageRepositoryInterface::class));
        });
    }

    public function boot()
    {
        //
    }
}
