<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryInterface
{
    public function list(string $term): Collection;
}