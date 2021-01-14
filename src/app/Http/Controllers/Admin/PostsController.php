<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Entities\Post\Post;
use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Core\CommandBus\CommandBusInterface;
use App\Http\Requests\Post\{CreatePostRequest, UpdatePostRequest};
use App\Commands\Post\{CreatePostCommand, UpdatePostCommand, DeletePostCommand};

class PostsController extends Controller
{
    private $bus;

    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        try {
            $this->bus->dispatch(new CreatePostCommand(), $request->toArray());
            return redirect()->route('admin.posts.index')->with('success', "Post created successfully !");
        } catch (Throwable $e) {
            return redirect()->route('admin.posts.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Post $post)
    {
        $gallery = [];
        foreach ($post->getGallery() as $media)
            $gallery[$media->uuid] = $media->getUrl();
        $post->load('tags');
        return view('admin.posts.edit', compact('post', 'gallery'));
    }

    public function update(Post $post, UpdatePostRequest $request): RedirectResponse
    {
        $this->bus->dispatch(new UpdatePostCommand($post), $request->toArray());
        return redirect()->back()->with('success', 'Post updated successfully !');
    }

    public function delete(int $id): RedirectResponse
    {
        $this->bus->dispatch(new DeletePostCommand($id));
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully !');
    }
}