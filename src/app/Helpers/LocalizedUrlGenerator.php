<?php

namespace App\Helpers;

class LocalizedUrlGenerator
{
    public function generate(): string
    {
        $url = request()->getRequestUri();

        if (str_contains($url, 'blog')) {
            $urlChunks = array_values(array_filter(explode('/', $url)));
        }

        dd($url);
    }
}