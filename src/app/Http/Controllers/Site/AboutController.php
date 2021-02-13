<?php

namespace App\Http\Controllers\Site;

use App\Entities\DataCenter\DataCenter;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('site.pages.about', [
            'dataCenters' => DataCenter::where('status', true)->get(),
        ]);
    }
}