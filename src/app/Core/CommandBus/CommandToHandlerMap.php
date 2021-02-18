<?php

namespace App\Core\CommandBus;

use App\Commands\Page\CreatePageCommand;
use App\Commands\Page\DeletePageCommand;
use App\Commands\Page\UpdatePageCommand;
use App\Handlers\Page\CreatePageHandler;
use App\Handlers\Page\DeletePageHandler;
use App\Handlers\Page\UpdatePageHandler;
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

            // Pages
            CreatePageCommand::class => CreatePageHandler::class,
            UpdatePageCommand::class => UpdatePageHandler::class,
            DeletePageCommand::class => DeletePageHandler::class,
        ];
    }
}