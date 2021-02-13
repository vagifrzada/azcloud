<?php

namespace App\Widgets;

use App\Entities\Partner;
use Arrilot\Widgets\AbstractWidget;

class Partners extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        $partners = Partner::where('status', true)->get();
        return filled($partners) ? view('widgets.partners', compact('partners')) : '';
    }
}
