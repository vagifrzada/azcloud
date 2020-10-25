<?php

namespace App\CommandBus;

/**
 * Interface CommandBusInterface
 * @package App\CommandBusInterface
 */
interface CommandBusInterface
{
    public function dispatch(string $commandName, array $payload = []): void;
}