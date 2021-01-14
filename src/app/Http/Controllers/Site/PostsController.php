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
        $latestRandomPost = $this->postRepository->getLatest(['exclude' => $post->getId(), 'random' => true]);
        return view('site.posts.show', compact('post', 'latestRandomPost'));
    }

    public function list(Request $request): JsonResponse
    {
        if (!filled($timestamp = $request->get('timestamp')))
            return response()->json(['status' => false, 'data' => '']);

        $posts = $this->postRepository->all(13, ['after-timestamp' => $timestamp]);
        $isStillFilled = filled($posts);
        return response()->json([
            'status' => $isStillFilled,
            'data'   => $isStillFilled ? view('site.posts.partials.posts', compact('posts'))->render() : '',
        ]);
    }
}