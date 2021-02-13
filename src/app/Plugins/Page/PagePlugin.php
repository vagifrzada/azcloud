<?php

namespace App\Plugins\Page;

use Illuminate\Support\Facades\Facade;

class PagePlugin extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Plugin::class;
    }
}