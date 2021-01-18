<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagsController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function show(string $slug)
    {
        $tag = $this->tagRepository->getBySlug($slug);
        $tag->load('posts');
        return view('site.posts.tag', compact('tag'));
    }
}