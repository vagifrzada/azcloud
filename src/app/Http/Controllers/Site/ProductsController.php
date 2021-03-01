<?php

namespace App\Http\Controllers\Site;

use App\Entities\Product\Product;
use App\Entities\Product\Category\Category;
use App\Repositories\Interfaces\PageRepositoryInterface;

class ProductsController
{
    public function index(PageRepositoryInterface $pageRepository)
    {
        $page = $pageRepository->getByIdentity('services');
        abort_if($page === null, 404);
        return view('site.products.index', compact('page'));
    }

    public function show(string $category, string $slug)
    {
        /** @var Category $category */
        $category = Category::active()->where('slug', $category)->firstOrFail();
        /** @var Product $product */
        $product = Product::query()
            ->where('category_id', $category->getId())
            ->where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        dd($product);

        // $meta = $product->getMeta();
        // $meta =  ['meta' => $product->getMeta() : ['title' => null, 'keywords' => null, 'description' => null]];
    }
}