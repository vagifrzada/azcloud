<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Helpers\LocalizedUrlGenerator;

if (! function_exists('settings')) {

    function settings($key, $default = null)
    {
        static $settings;

        if (is_null($settings)) {
            $settings = Cache::rememberForever('settings', function () {
                return Arr::pluck(
                    DB::table('settings')->get(['value', 'key'])->toArray(), 'value', 'key'
                );
            });
        }

        return $settings[$key] ?? $default;
    }
}

if (! function_exists('localizedUrl')) {

    function localizedUrl(string $lang): string
    {
        return app(LocalizedUrlGenerator::class)->generate($lang);
    }
}

if (! function_exists('escapeLike')) {

    function escapeLike(string $value, string $char = '\\'): string
    {
        return str_replace(
            [$char, '%', '_'],
            [$char.$char, $char.'%', $char.'_'],
            $value
        );
    }
}