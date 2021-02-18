<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductCategoriesDataTable;
use App\Entities\Product\Category\Category;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function index(ProductCategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.products.categories.index');
    }

    public function create()
    {
        return view('admin.products.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'slug'      => 'required',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $category = new Category();
            $category->slug = $request->get('slug');
            $category->status = (bool) $request->get('status');

            foreach ($category->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $category->translateOrNew($locale)->{$attribute} = $value;

            $category->save();

            DB::commit();
            return redirect()->route('admin.product-category.index')->with('success', 'Category created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing category.', compact('e'));
            return redirect()->route('admin.product-category.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Category $product_category)
    {
        return view('admin.products.categories.edit', ['category' => $product_category]);
    }

    public function update(Category $product_category, Request $request)
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $category = $product_category;
            $category->status = (bool) $request->get('status');

            foreach ($category->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $category->translate($locale)->{$attribute} = $value;

            $category->save();

            DB::commit();
            return redirect()->back()->with('success', 'Category updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating category.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.product-category.index')->with('success', 'Category deleted successfully !');
    }
}