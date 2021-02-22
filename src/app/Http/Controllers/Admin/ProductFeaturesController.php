<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductFeaturesDatatable;
use App\Entities\Product\Feature\Feature;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFeaturesController extends Controller
{
    public function index(ProductFeaturesDatatable $datatable)
    {
        return $datatable->render('admin.products.features.index');
    }

    public function create()
    {
        return view('admin.products.features.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:2',
            'title.*'   => 'required|string|min:2',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $feature = new Feature();
            $feature->status = (bool) $request->get('status');

            foreach ($feature->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $feature->translateOrNew($locale)->{$attribute} = $value;

            $feature->save();

            if ($request->hasFile('image')) {
                $feature->addMedia($request->file('image'))->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->route('admin.product-features.index')->with('success', 'Feature created successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing benefit.', compact('e'));
            return redirect()->route('admin.product-features.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Feature $product_feature)
    {
        return view('admin.products.features.edit', ['feature' => $product_feature]);
    }

    public function update(Feature $product_feature, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:2',
            'title.*'   => 'required|string|min:2',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $feature = $product_feature;
            $feature->status = (bool) $request->get('status');

            foreach ($feature->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $feature->translate($locale)->{$attribute} = $value;

            $feature->save();

            if ($request->has('image')) {
                $feature->addMedia($request->file('image'))->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Feature updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating feature.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id): RedirectResponse
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->route('admin.product-features.index')->with('success', 'Feature deleted successfully !');
    }
}