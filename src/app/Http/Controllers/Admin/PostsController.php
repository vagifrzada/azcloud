<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }
}