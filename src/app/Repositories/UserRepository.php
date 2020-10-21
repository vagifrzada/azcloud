<?php

namespace App\Repositories;

use App\Entities\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    public function get(int $id)
    {
        return User::findOrFail($id);
    }

    public function remove(User $user): bool
    {
        return $user->delete();
    }
}
