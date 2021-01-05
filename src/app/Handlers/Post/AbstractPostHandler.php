<?php

namespace App\Handlers\Post;

use App\Entities\Tag;
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
                return Tag::firstOrCreate(['name' => $tag])->getId();
            });
    }
}