<?php

namespace App\Core\CommandBus;

use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Exception\MissingHandlerException;

class Locator implements HandlerLocator
{
    private $handlers = [];

    public function __construct(array $handlerMap)
    {
        foreach ($handlerMap as $command => $handler)
            $this->addHandler($command, $handler);
    }

    public function getHandlerForCommand($commandName): object
    {
        if (!isset($this->handlers[$commandName]))
            throw MissingHandlerException::forCommand($commandName);

        return $this->handlers[$commandName];
    }

    private function addHandler(string $commandName, string $handlerName): void
    {
        $this->handlers[$commandName] = app($handlerName);
    }
}