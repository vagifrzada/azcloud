<?php

namespace App\Commands\User;

use App\Core\CommandBus\Command;

class DeleteUserCommand extends Command
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