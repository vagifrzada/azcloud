<?php

namespace App\Repositories\Interfaces;

use App\Entities\Post\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function all(int $limit, array $filters = []): Collection;
    public function get(int $id): Post;
    public function getLatest(array $filters = []): ?Post;
    public function getBySlug(string $slug, string $locale): Post;
    public function remove(Post $post): bool;
    public function save(Post $post): Post;
}