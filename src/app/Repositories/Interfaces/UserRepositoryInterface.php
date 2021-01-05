<?php

namespace App\Repositories\Interfaces;

use App\Entities\User;

interface UserRepositoryInterface
{
    public function get(int $id): User;
    public function remove(User $user): bool;
    public function save(User $user): User;
}
