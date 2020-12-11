<?php

namespace App\Handlers\User;

use App\Repositories\UserRepository;
use App\Commands\User\DeleteUserCommand;

class DeleteUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(DeleteUserCommand $command): void
    {
        $this->userRepository->remove($this->userRepository->get($command->getId()));
    }
}