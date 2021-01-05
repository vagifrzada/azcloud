<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        foreach ($this->getRepositories() as $abstract => $repository) {
            $this->app->singleton($abstract, $repository);
        }
    }

    protected function getRepositories(): array
    {
        return [
            UserRepositoryInterface::class => UserRepository::class,
            PostRepositoryInterface::class => PostRepository::class,
        ];
    }
}
