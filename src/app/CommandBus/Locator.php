<?php

namespace App\CommandBus;

use RuntimeException;
use League\Tactician\Handler\Locator\HandlerLocator;

/**
 * Class Locator
 * @package App\CommandBus\Adapter
 */
class Locator implements HandlerLocator
{
    public function getHandlerForCommand($commandName)
    {
        $handler = str_replace('Commands\\', 'Handlers\\', $commandName) . 'Handler';
        if (!class_exists($handler))
            throw new RuntimeException("Command handler does not exist ! Class: {$handler}");
        return app($handler);
    }
}