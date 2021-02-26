<?php

namespace App\Http\Controllers\Site;

use App\Entities\Product\Category\Category;
use App\Entities\Product\Product;

class ProductsController
{
    public function index()
    {
        
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
    }
}