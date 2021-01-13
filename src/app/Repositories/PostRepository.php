<?php

namespace App\Repositories;

use RuntimeException;
use App\Entities\Post\Post;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function get(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function all(int $limit): Collection
    {
        return Post::query()->limit($limit)->get();
    }

    public function getBySlug(string $slug, string $locale): Post
    {
        return Post::whereTranslation('slug', e($slug), $locale)->firstOrFail();
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