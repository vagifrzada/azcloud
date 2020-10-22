<?php

namespace App\Repositories;

use App\Entities\User;
use RuntimeException;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    public function get(int $id): User
    {
        return User::findOrFail($id);
    }

    public function remove(User $user): bool
    {
        return $user->delete();
    }

    public function save(User $user): User
    {
        if (!$user->save())
            throw new RuntimeException("Can't save user.");
        return $user;
    }
}
