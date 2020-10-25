<?php

namespace App\Providers;

use App\CommandBus\Locator;
use League\Tactician\CommandBus;
use App\CommandBus\CommandBusInterface;
use Illuminate\Support\ServiceProvider;
use App\CommandBus\Adapter\TacticianCommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;

/**
 * Class CommandBusServiceProvider
 * @package App\Providers
 */
class CommandBusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CommandBusInterface::class, function () {
            return new TacticianCommandBus(new CommandBus([
                new CommandHandlerMiddleware(
                    new ClassNameExtractor(),
                    new Locator(),
                    new HandleInflector()
                )
            ]));
        });
    }
}
