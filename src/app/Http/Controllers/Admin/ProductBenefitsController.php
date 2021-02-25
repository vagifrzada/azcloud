<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductBenefitsDatatable;
use App\Entities\Product\Benefit\Benefit;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductBenefitsController extends Controller
{
    public function index(ProductBenefitsDatatable $datatable)
    {
        return $datatable->render('admin.products.benefits.index');
    }

    public function create()
    {
        return view('admin.products.benefits.create');
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
            $benefit = new Benefit();
            $benefit->status = (bool) $request->get('status');

            foreach ($benefit->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $benefit->translateOrNew($locale)->{$attribute} = $value;

            $benefit->save();

            if ($request->hasFile('image')) {
                $benefit->addMedia($request->file('image'))->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->route('admin.product-benefits.index')->with('success', 'Benefit created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing benefit.', compact('e'));
            return redirect()->route('admin.product-benefits.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Benefit $product_benefit)
    {
        return view('admin.products.benefits.edit', ['benefit' => $product_benefit]);
    }

    public function update(Benefit $product_benefit, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $benefit = $product_benefit;
            $benefit->status = (bool) $request->get('status');

            foreach ($benefit->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $benefit->translateOrNew($locale)->{$attribute} = $value;

            $benefit->save();

            if ($request->hasFile('image')) {
                $benefit->addMedia($request->file('image'))->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Benefit updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating benefit.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $id): RedirectResponse
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();
        return redirect()->route('admin.product-benefits.index')->with('success', 'Benefit deleted successfully !');
    }
}