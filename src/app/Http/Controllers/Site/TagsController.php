<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function show(string $tag)
    {
        dd($tag);
    }
}