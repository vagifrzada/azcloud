<?php

namespace App\CommandBus\Adapter;

use App\CommandBus\Command;
use InvalidArgumentException;
use League\Tactician\CommandBus;
use App\CommandBus\CommandBusInterface;

/**
 * Class TacticianCommandBus
 * @package App\CommandBusInterface\Adapter
 */
class TacticianCommandBus implements CommandBusInterface
{
    /** @var CommandBus */
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function dispatch(string $commandName, array $payload = []): void
    {
        if (!class_exists($commandName) || !method_exists($commandName, 'fromPayload'))
            throw new InvalidArgumentException("Invalid command ! Class: {$commandName}");

        /** @var Command $command */
        $command = $commandName::fromPayload($payload);
        $this->bus->handle($command);
    }
}