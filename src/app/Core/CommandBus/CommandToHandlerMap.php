<?php

namespace App\Core\CommandBus;

use App\Commands\Service\{CreateServiceCommand, DeleteServiceCommand, UpdateServiceCommand};
use App\Handlers\Service\{CreateServiceHandler, DeleteServiceHandler, UpdateServiceHandler};
use App\Commands\Post\{CreatePostCommand, UpdatePostCommand, DeletePostCommand};
use App\Handlers\Post\{CreatePostHandler, UpdatePostHandler, DeletePostHandler};
use App\Commands\User\{CreateUserCommand, UpdateUserCommand, DeleteUserCommand};
use App\Handlers\User\{CreateUserHandler, UpdateUserHandler, DeleteUserHandler};

class CommandToHandlerMap
{
    public static function get(): array
    {
        return [
            // Users
            CreateUserCommand::class => CreateUserHandler::class,
            UpdateUserCommand::class => UpdateUserHandler::class,
            DeleteUserCommand::class => DeleteUserHandler::class,

            // Posts
            CreatePostCommand::class => CreatePostHandler::class,
            UpdatePostCommand::class => UpdatePostHandler::class,
            DeletePostCommand::class => DeletePostHandler::class,

            // Services
            CreateServiceCommand::class => CreateServiceHandler::class,
            UpdateServiceCommand::class => UpdateServiceHandler::class,
            DeleteServiceCommand::class => DeleteServiceHandler::class,
        ];
    }
}