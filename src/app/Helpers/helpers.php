<?php

use App\Helpers\LocalizedUrlGenerator;

if (! function_exists('localizedUrl')) {

    function localizedUrl(string $lang): string
    {
        return app(LocalizedUrlGenerator::class)->generate($lang);
    }
}