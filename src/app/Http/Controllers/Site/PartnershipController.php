<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PageRepositoryInterface;

class PartnershipController extends Controller
{
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $page = $this->pageRepository->getByIdentity('partnership');

        return view('site.pages.partnership', [
            'meta' => ($page !== null) ? $page->getMeta() : ['title' => null, 'keywords' => null, 'description' => null],
        ]);
    }
}