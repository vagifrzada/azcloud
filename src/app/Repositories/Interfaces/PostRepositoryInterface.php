<?php

namespace App\Repositories\Interfaces;

use App\Entities\Post\Post;

interface PostRepositoryInterface
{
    public function get(int $id): Post;
    public function remove(Post $post): bool;
    public function save(Post $post): Post;
}