<?php

namespace App\Commands\Page;

use App\Core\CommandBus\Command;

class DeletePageCommand extends Command
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