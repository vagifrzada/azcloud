<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    private const SEARCH_LIMIT = 10;

    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        $request->validate(['q' => 'required|min:3', 'page' => 'numeric']);
        $page = (int) $request->get('page', 1);
        $offset = ($page - 1) * self::SEARCH_LIMIT;
        $result = $this->searchService->handle($request->get('q'), self::SEARCH_LIMIT, $offset);
        $resultCount = $result['resultCount'];
        $payload = [
            'data' => $result['data'],
            'resultCount' => $resultCount,
            'canLoadMore' => ($resultCount >= self::SEARCH_LIMIT),
        ];
        if ($request->ajax())
            return response()->json(['success' => true, 'html' => view('site.partials.search-blocks', $payload)->render()]);
        return view('site.pages.search', $payload);
    }
}