<?php

namespace App\Providers;

use League\Tactician\CommandBus;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use App\Core\CommandBus\Adapter\TacticianCommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use App\Core\CommandBus\{CommandBusInterface, Locator, CommandToHandlerMap};

/**
 * Class CommandBusServiceProvider
 * @package App\Providers
 */
class CommandBusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Locator::class, function () {
            return new Locator(CommandToHandlerMap::get());
        });

        $this->app->singleton(CommandBusInterface::class, function (Container $app) {
            return new TacticianCommandBus(new CommandBus([
                new CommandHandlerMiddleware(
                    new ClassNameExtractor(),
                    $app->get(Locator::class),
                    new HandleInflector()
                )
            ]));
        });
    }
}
