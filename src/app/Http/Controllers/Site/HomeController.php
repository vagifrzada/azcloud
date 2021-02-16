<?php

namespace App\Http\Controllers\Site;

use App\Entities\DataCenter\DataCenter;
use App\Entities\Post\Post;
use App\Entities\Slider\Slider;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PageRepositoryInterface;

class HomeController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $page = $this->pageRepository->getByIdentity('homepage');
        return view('site.index', [
            'sliders' => Slider::where('status', true)->orderBy('order', 'ASC')->get(),
            'latestPost' => Post::where('status', true)->latest()->limit(1)->first(),
            'dataCenters' => DataCenter::where('status', true)->get(),
            'meta' => ($page !== null) ? $page->getMeta() : [
                'title' => null,
                'keywords' => null,
                'description' => null,
            ],
        ]);
    }
}