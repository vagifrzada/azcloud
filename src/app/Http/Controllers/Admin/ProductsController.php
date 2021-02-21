<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Product\Benefit\Benefit;
use App\Entities\Product\Bundle\Bundle;
use App\Entities\Product\UseCase\UseCase;
use Illuminate\Http\Request;
use App\Entities\Product\Product;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsDataTable;
use App\Entities\Product\Category\Category;
use Illuminate\Support\Collection;

class ProductsController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    public function selectCategory()
    {
        return view('admin.products.select-category', [
            'categories' => Category::active()->get(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate(['category' => 'required|numeric']);
        $category = Category::findOrFail((int)$request->get('category'));
        $renderable = !view()->exists(($template = 'admin.products.create.' . $category->getSlug()))
            ? 'admin.products.create.compute' // Displaying default template.
            : $template;

        return view($renderable, [
            'category' => $category,
            'bundles'  => $this->getBundlesForCategory($category),
            'benefits' => Benefit::active()->get(),
            'useCases' => UseCase::active()->get(),
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit(Product $product)
    {
        dd($product);
    }

    public function update()
    {

    }

    public function delete(Product $product)
    {
        dd($product);
    }

    private function getBundlesForCategory(Category $category): Collection
    {
        switch ($category->getSlug()) {
            case 'compute': return Bundle::active()->forCompute()->get();
            case 'networking': return Bundle::active()->forNetworking()->get();
            default: return collect();
        }
    }
}