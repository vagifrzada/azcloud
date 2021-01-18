<?php

namespace App\Helpers;

use App\Entities\Post\Post;
use App\Entities\Post\Translation;
use Illuminate\Support\Facades\Route;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizedUrlGenerator
{
    private $uri;
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->uri = $this->parseUri();
    }

    public function generate(string $lang): string
    {
        $url = null;
        if (Route::is('site.blog.show'))
            $url = $this->generateUrlForPost($lang);

        return LaravelLocalization::getLocalizedURL($lang, $url, [], true);
    }

    private function generateUrlForPost(string $lang): string
    {
        [$locale,, $slug] = $this->uri;
        $post = $this->postRepository->getBySlug($slug, $locale);
        /** @var Translation $translation */
        $translation = $post->translate($lang);
        return route('site.blog.show', ['slug' => $translation->getSlug()]);
    }

    private function parseUri(): array
    {
        return array_values(
            array_filter(explode('/', request()->getRequestUri()))
        );
    }
}