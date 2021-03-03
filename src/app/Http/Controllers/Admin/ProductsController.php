<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Entities\Product\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\DataTables\ProductsDataTable;
use App\Entities\Product\Bundle\Bundle;
use App\Entities\Product\UseCase\UseCase;
use App\Entities\Product\Benefit\Benefit;
use App\Entities\Product\Feature\Feature;
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
        $category = Category::findOrFail((int) $request->get('category'));
        $payload = [
            'category' => $category,
            'bundles'  => $this->getBundlesForCategory($category),
            'benefits' => Benefit::active()->get(),
            'useCases' => UseCase::active()->get(),
            'features' => Feature::active()->get(),
            'products' => [],
        ];

        if ($category->getSlug() === 'network') {
            $payload['products'] = Product::query()
                ->with('children')
                ->where('parent_id', 0)
                ->where('category_id', $category->getId())
                ->get();
        }

        return view('admin.products.create', $payload);
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'title' => 'required|unique:products',
            'subtitle' => 'required',
            'benefits' => 'required|array',
            'use_cases' => 'required|array',
            'features' => 'required|array',
        ];
        $category = Category::findOrFail((int) $request->get('category'));
        if ($category->getSlug() !== 'storage')
            $rules['bundles'] = 'required|array';
        $request->validate($rules);

        DB::beginTransaction();

        try {
            $product = new Product();
            $product->title = $request->get('title');
            $product->subtitle = $request->get('subtitle');
            $product->slug = Str::slug($product->title);
            $product->category_id = $category->getId();
            $product->status = (bool) $request->get('status');

            if ($category->getSlug() === 'network')
                $product->parent_id = $request->get('parent_id', 0);

            foreach ($product->translatedAttributes as $attribute) {
                foreach ($request->get($attribute) as $locale => $value) {
                    if (in_array($attribute, $product->jsonableAttributes))
                        $value = json_encode($value);
                    $product->translateOrNew($locale)->{$attribute} = $value;
                }
            }

            $product->save();

            if ($request->hasFile(Product::MEDIA_COVER)) {
                $product->addMedia($request->file(Product::MEDIA_COVER))
                    ->toMediaCollection(Product::MEDIA_COVER);
            }

            $product->bundles()->sync($request->get('bundles', []));

            if ($request->hasFile(Product::MEDIA_BENEFITS_COVER)) {
                $product->addMedia($request->file(Product::MEDIA_BENEFITS_COVER))
                    ->toMediaCollection(Product::MEDIA_BENEFITS_COVER);
            }

            $product->benefits()->sync($request->get('benefits', []));

            if ($request->hasFile(Product::MEDIA_CASES_COVER)) {
                $product->addMedia($request->file(Product::MEDIA_CASES_COVER))
                    ->toMediaCollection(Product::MEDIA_CASES_COVER);
            }

            $product->cases()->sync($request->get('use_cases', []));
            $product->features()->sync($request->get('features', []));

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully !');
        } catch (Throwable $e) {
            DB::rollback();
            logger()->error('Error occurred while storing product.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->input());
        }
    }

    public function edit(Product $product)
    {
        $category = $product->getCategory();
        $payload = [
            'category' => $category,
            'bundles'  => $this->getBundlesForCategory($category),
            'benefits' => Benefit::active()->get(),
            'useCases' => UseCase::active()->get(),
            'features' => Feature::active()->get(),
            'product'  => $product,
            'products' => [],
        ];

        if ($category->getSlug() === 'network') {
            $payload['products'] = Product::query()
                ->with('children')
                ->where('parent_id', 0)
                ->where('category_id', $category->getId())
                ->where('id', '<>', $product->getId())
                ->get();
        }

        return view('admin.products.edit', $payload);
    }

    public function update(Product $product, Request $request): RedirectResponse
    {
        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'benefits' => 'required|array',
            'use_cases' => 'required|array',
            'features' => 'required|array',
        ];
        $category = $product->getCategory();
        if ($category->getSlug() !== 'storage')
            $rules['bundles'] = 'required|array';

        if ($product->getTitle() !== $request->get('title'))
            $rules['title'] = 'required|unique:products';

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $product->title = $request->get('title');
            $product->subtitle = $request->get('subtitle');
            $product->slug = Str::slug($product->title);
            $product->category_id = $category->getId();
            $product->status = (bool) $request->get('status');

            if ($category->getSlug() === 'network')
                $product->parent_id = $request->get('parent_id', 0);

            foreach ($product->translatedAttributes as $attribute) {
                foreach ($request->get($attribute, []) as $locale => $value) {
                    if (in_array($attribute, $product->jsonableAttributes))
                        $value = json_encode($value);
                    $product->translateOrNew($locale)->{$attribute} = $value;
                }
            }

            $product->save();

            if ($request->hasFile(Product::MEDIA_COVER)) {
                $product->addMedia($request->file(Product::MEDIA_COVER))
                    ->toMediaCollection(Product::MEDIA_COVER);
            }

            $product->bundles()->sync($request->get('bundles', []));

            if ($request->hasFile(Product::MEDIA_BENEFITS_COVER)) {
                $product->addMedia($request->file(Product::MEDIA_BENEFITS_COVER))
                    ->toMediaCollection(Product::MEDIA_BENEFITS_COVER);
            }

            $product->benefits()->sync($request->get('benefits', []));

            if ($request->hasFile(Product::MEDIA_CASES_COVER)) {
                $product->addMedia($request->file(Product::MEDIA_CASES_COVER))
                    ->toMediaCollection(Product::MEDIA_CASES_COVER);
            }

            $product->cases()->sync($request->get('use_cases', []));
            $product->features()->sync($request->get('features', []));

            DB::commit();
            return redirect()->back()->with('success', 'Product updated successfully !');
        } catch (Throwable $e) {
            DB::rollback();
            logger()->error('Error occurred while updating product.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->input());
        }
    }

    public function delete($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully !');
    }

    private function getBundlesForCategory(Category $category): Collection
    {
        switch ($category->getSlug()) {
            case 'compute': return Bundle::active()->forCompute()->get();
            case 'network': return Bundle::active()->forNetwork()->get();
            default: return collect();
        }
    }
}