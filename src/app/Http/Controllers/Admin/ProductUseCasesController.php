<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductCasesDatatable;
use App\Entities\Product\Benefit\Benefit;
use App\Entities\Product\UseCase\UseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductUseCasesController extends Controller
{
    public function index(ProductCasesDatatable $datatable)
    {
        return $datatable->render('admin.products.cases.index');
    }

    public function create()
    {
        return view('admin.products.cases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $case = new UseCase();
            $case->status = (bool) $request->get('status');

            foreach ($case->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $case->translateOrNew($locale)->{$attribute} = $value;

            $case->save();
            DB::commit();
            return redirect()->route('admin.product-cases.index')->with('success', 'Use case created successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing use case.', compact('e'));
            return redirect()->route('admin.product-cases.index')->with('error', $e->getMessage());
        }
    }

    public function edit(UseCase $product_case)
    {
        return view('admin.products.cases.edit', ['useCase' => $product_case]);
    }

    public function update(UseCase $product_case, Request $request)
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $product_case->status = (bool) $request->get('status');

            foreach ($product_case->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $product_case->translate($locale)->{$attribute} = $value;

            $product_case->save();
            DB::commit();
            return redirect()->back()->with('success', 'Use case update successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating use case.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        $useCase = UseCase::findOrFail($id);
        $useCase->delete();
        return redirect()->back()->with('success', 'Use case deleted successfully');
    }
}