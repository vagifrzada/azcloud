<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (! function_exists('localizedUrl')) {

    function localizedUrl(string $lang): string
    {
        return LaravelLocalization::getLocalizedURL($lang, null, [], true);
    }
}