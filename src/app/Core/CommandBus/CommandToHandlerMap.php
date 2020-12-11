<?php

namespace App\Core\CommandBus;

use App\Commands\User\CreateUserCommand;
use App\Commands\User\DeleteUserCommand;
use App\Commands\User\UpdateUserCommand;
use App\Handlers\User\CreateUserHandler;
use App\Handlers\User\DeleteUserHandler;
use App\Handlers\User\UpdateUserHandler;

class CommandToHandlerMap
{
    public static function get(): array
    {
        return [
            // Users
            CreateUserCommand::class => CreateUserHandler::class,
            UpdateUserCommand::class => UpdateUserHandler::class,
            DeleteUserCommand::class => DeleteUserHandler::class,
        ];
    }
}