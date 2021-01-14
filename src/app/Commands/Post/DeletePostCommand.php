<?php

namespace App\Commands\Post;

use App\Core\CommandBus\Command;

class DeletePostCommand extends Command
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