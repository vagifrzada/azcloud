<?php

namespace App\Repositories\Interfaces;

use App\Entities\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
    public function get(int $id);
    public function remove(User $user): bool;
}
