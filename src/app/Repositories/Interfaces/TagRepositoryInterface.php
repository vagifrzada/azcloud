<?php

namespace App\Repositories\Interfaces;

use App\Entities\Tag;
use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryInterface
{
    public function list(string $term): Collection;
    public function getBySlug(string $slug): Tag;
}