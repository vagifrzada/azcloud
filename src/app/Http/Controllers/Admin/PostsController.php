<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Commands\Post\CreatePostCommand;
use App\Core\CommandBus\CommandBusInterface;
use App\Http\Requests\Post\CreatePostRequest;

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
            dd($e);
        }
    }
}