<?php

namespace App\Handlers\User;

use App\Repositories\UserRepository;
use App\Commands\User\UpdateUserCommand;

class UpdateUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UpdateUserCommand $command): void
    {
        $user = $command->getUser();
        $user->setName($command->name);
        $user->setEmail($command->email);
        $user->setStatus((int)$command->status);

        if ($command->password !== null)
            $user->setPassword($command->password);

        $this->userRepository->save($user);
    }
}