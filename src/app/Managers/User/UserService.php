<?php

namespace App\Managers\User;

use App\Entities\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserService
 * @package App\Managers
 */
class UserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(UserParameterBag $bag): User
    {
        $user = new User();
        $user->setName($bag->getName());
        $user->setEmail($bag->getEmail());
        $user->setPassword($bag->getPassword());
        $user->setStatus($bag->getStatus());
        return $this->userRepository->save($user);
    }

    public function update(User $user, UserParameterBag $bag): User
    {
        $user->setName($bag->getName());
        $user->setEmail($bag->getEmail());
        $user->setStatus($bag->getStatus());

        if ($bag->getPassword() !== null)
            $user->setPassword($bag->getPassword());

        return $this->userRepository->save($user);
    }

    public function delete(int $id): bool
    {
        return $this->userRepository->remove($this->userRepository->get($id));
    }
}
