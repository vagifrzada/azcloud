<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostsController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return view('site.posts.index');
    }

    public function show(string $slug)
    {
        return view('site.posts.show', [
            'post' => $this->postRepository->getBySlug($slug, $this->getLocale()),
        ]);
    }
}