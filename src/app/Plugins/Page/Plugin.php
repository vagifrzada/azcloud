<?php

namespace App\Plugins\Page;

use App\Entities\Page\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;

class Plugin
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function getByIdentity(array $params = []): ?Page
    {
        $identity = $params['identity'] ?? null;
        return $this->pageRepository->getByIdentity($identity);
    }
}