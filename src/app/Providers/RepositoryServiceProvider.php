<?php

namespace App\Providers;

use App\Repositories\PageRepository;
use App\Repositories\TagRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        foreach ($this->getRepositories() as $abstract => $repository)
            $this->app->singleton($abstract, $repository);
    }

    protected function getRepositories(): array
    {
        return [
            UserRepositoryInterface::class => UserRepository::class,
            PostRepositoryInterface::class => PostRepository::class,
            TagRepositoryInterface::class => TagRepository::class,
            PageRepositoryInterface::class => PageRepository::class,
        ];
    }
}
