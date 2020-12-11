<?php

namespace App\Handlers\User;

use App\Entities\User;
use App\Repositories\UserRepository;
use App\Commands\User\CreateUserCommand;

class CreateUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserCommand $command): void
    {
        $user = new User();
        $user->setName($command->name);
        $user->setEmail($command->email);
        $user->setPassword($command->password);
        $user->setStatus((int) $command->status);
        $this->userRepository->save($user);
    }
}