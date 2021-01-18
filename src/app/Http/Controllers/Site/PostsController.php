<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
        return view('site.posts.index', [
            'posts' => $this->postRepository->all(13),
        ]);
    }

    public function show(string $slug)
    {
        $post = $this->postRepository->getBySlug($slug, $this->getLocale());
        return view('site.posts.show', [
            'post' => $post,
            'latestRandomPost' => $this->postRepository->getLatest(['exclude' => $post->getId(), 'random' => true]),
            'olderPosts' => $this->postRepository->all(3, ['before-timestamp' => $post->getCreatedAt()]),
        ]);
    }

    public function list(Request $request): JsonResponse
    {
        ['timestamp' => $timestamp, 'template' => $template] = $request->validate([
            'timestamp' => 'required|date_format:Y-m-d H:i:s', 'template' => 'required|in:index,triple',
        ]);

        $limit = $template === 'index' ? 13 : 3;
        if (!view()->exists($template = ('site.posts.partials.' . $template)))
            return response()->json(['success' => false, 'data' => '', 'status' => 404]);

        $posts = $this->postRepository->all($limit, ['before-timestamp' => $timestamp]);
        $isStillFilled = filled($posts);
        return response()->json([
            'success' => $isStillFilled,
            'data'    => $isStillFilled ? view($template, compact('posts'))->render() : '',
        ]);
    }
}