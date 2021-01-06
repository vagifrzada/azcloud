<?php

namespace App\Repositories;

use App\Entities\Tag;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function list(string $term): Collection
    {
        return Tag::query()
            ->select(['id', 'name as text'])
            ->where('name', 'like', "%$term%")
            ->orderBy('name')
            ->get();
    }
}