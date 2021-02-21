<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductBundlesDatatable;
use App\Entities\Product\Bundle\Bundle;
use App\Entities\Product\Category\Category;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductBundlesController extends Controller
{
    public function index(ProductBundlesDatatable $datatable)
    {
        return $datatable->render('admin.products.bundles.index');
    }

    public function create()
    {
        return view('admin.products.bundles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $bundle = new Bundle();
            if ($request->has('price'))
                $bundle->price = ($request->get('price') * 100);
            $bundle->status = (bool) $request->get('status');

            foreach ($bundle->translatedAttributes as $attribute) {
                foreach ($request->get($attribute) as $locale => $value) {
                    $translationValue = ($attribute === 'options') ? json_encode($value) : $value;
                    $bundle->translateOrNew($locale)->{$attribute} = $translationValue;
                }
            }

            $bundle->save();

            DB::commit();
            return redirect()->route('admin.product-bundles.index')->with('success', 'Bundle created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing bundle.', compact('e'));
            return redirect()->route('admin.product-bundles.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Bundle $product_bundle)
    {
        return view('admin.products.bundles.edit', ['bundle' => $product_bundle]);
    }

    public function update(Bundle $product_bundle, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $bundle = $product_bundle;
            if ($request->has('price'))
                $bundle->price = ($request->get('price') * 100);
            $bundle->status = (bool) $request->get('status');

            foreach ($bundle->translatedAttributes as $attribute) {
                foreach ($request->get($attribute) as $locale => $value) {
                    $translationValue = ($attribute === 'options') ? json_encode($value) : $value;
                    $bundle->translateOrNew($locale)->{$attribute} = $translationValue;
                }
            }

            $bundle->save();

            DB::commit();
            return redirect()->back()->with('success', 'Bundle updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating bundle.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $id): RedirectResponse
    {
        $bundle = Bundle::findOrFail($id);
        $bundle->delete();
        return redirect()->route('admin.product-bundles.index')->with('success', 'Bundle deleted successfully !');
    }
}