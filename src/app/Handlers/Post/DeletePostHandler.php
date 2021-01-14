<?php

namespace App\Handlers\Post;

use App\Commands\Post\DeletePostCommand;
use App\Repositories\Interfaces\PostRepositoryInterface;

class DeletePostHandler
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function handle(DeletePostCommand $command): void
    {
        $this->postRepository->remove($this->postRepository->get($command->getId()));
    }
}