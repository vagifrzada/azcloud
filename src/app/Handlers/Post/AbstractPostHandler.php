<?php

namespace App\Handlers\Post;

use App\Entities\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\PostRepositoryInterface;

abstract class AbstractPostHandler
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    protected function prepareTags(array $tags): Collection
    {
        return collect($tags)
            ->map(function (string $tag) {
                return is_numeric($tag)
                    ? intval($tag)
                    : Tag::firstOrCreate(['name' => $tag, 'slug' => Str::slug($tag)])->getId();
            });
    }
}