<?php

namespace App\Http\Controllers\Site;

use App\Entities\Certificate\Certificate;
use App\Entities\DataCenter\DataCenter;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PageRepositoryInterface;

class AboutController extends Controller
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
        $page = $this->pageRepository->getByIdentity('about-intro');

        return view('site.pages.about', [
            'dataCenters' => DataCenter::where('status', true)->get(),
            'certificates' => Certificate::where('status', true)->get(),
            'meta' => ($page !== null) ? $page->getMeta() : ['title' => null, 'keywords' => null, 'description' => null],
        ]);
    }
}