<?php

namespace App\Core\CommandBus\Adapter;

use App\Core\CommandBus\Command;
use League\Tactician\CommandBus;
use App\Core\CommandBus\CommandBusInterface;

class TacticianCommandBus implements CommandBusInterface
{
    /** @var CommandBus */
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function dispatch(Command $command, array $payload = []): void
    {
        if (filled($payload))
            $command->handlePayload($payload);
        $this->bus->handle($command);
    }
}