<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function clearCache(): RedirectResponse
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Success! Cache cleared !');
    }
}
