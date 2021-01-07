<?php

namespace App\Core\CommandBus;

use App\Commands\Post\{
    CreatePostCommand,
    UpdatePostCommand};
use App\Handlers\Post\{
    CreatePostHandler,
    UpdatePostHandler};
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
        ];
    }
}