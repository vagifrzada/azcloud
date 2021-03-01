<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Entities\Product\Category\Category;

class ServicesWidget extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.services', [
            'categories' => Category::active()->with('products')->get(),
        ]);
    }
}
