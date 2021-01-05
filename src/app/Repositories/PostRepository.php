<?php

namespace App\Repositories;

use RuntimeException;
use App\Entities\Post\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function get(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function remove(Post $post): bool
    {
        return $post->delete();
    }

    public function save(Post $post): Post
    {
        if (!$post->save())
            throw new RuntimeException("Can't save post.");
        return $post;
    }
}