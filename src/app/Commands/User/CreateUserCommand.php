<?php

namespace App\Commands\User;

use App\Core\CommandBus\Command;

class CreateUserCommand extends Command
{
    /** @var string $name */
    public $name;

    /** @var string $email */
    public $email;

    /** @var string $password */
    public $password;

    /** @var bool $status */
    public $status;
}