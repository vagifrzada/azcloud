<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entities\Product\Product;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsDataTable;
use App\Entities\Product\Category\Category;

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

        return view($renderable);
    }

    public function store(Request $request)
    {

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
}