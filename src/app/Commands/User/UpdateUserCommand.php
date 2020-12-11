<?php

namespace App\Commands\User;

use App\Entities\User;
use App\Core\CommandBus\Command;

class UpdateUserCommand extends Command
{
    /** @var string $name */
    public $name;

    /** @var string $email */
    public $email;

    /** @var string $password */
    public $password;

    /** @var bool $status */
    public $status;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}