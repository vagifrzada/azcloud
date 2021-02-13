<?php

namespace App\Handlers\Page;

use App\Commands\Page\DeletePageCommand;
use App\Repositories\Interfaces\PageRepositoryInterface;

class DeletePageHandler
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function handle(DeletePageCommand $command): void
    {
        $this->pageRepository->remove($this->pageRepository->get($command->getId()));
    }
}