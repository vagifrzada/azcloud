<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class PartnershipController extends Controller
{
    public function index()
    {
        return view('site.pages.partnership');
    }
}