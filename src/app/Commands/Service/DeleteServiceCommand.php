<?php

namespace App\Commands\Service;

use App\Core\CommandBus\Command;

class DeleteServiceCommand extends Command
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}