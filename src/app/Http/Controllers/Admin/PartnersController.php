<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PartnersDataTable;
use App\Entities\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index(PartnersDataTable $dataTable)
    {
        return $dataTable->render('admin.partners.index');
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['image' => 'required|image', 'status' => 'required|boolean']);

        $partner = new Partner();
        $partner->title = $request->get('title');
        $partner->link = $request->get('link');
        $partner->status = (bool) $request->get('status');
        $partner->save();
        $partner->addMedia($request->file('image'))->toMediaCollection('cover');
        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully !');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Partner $partner, Request $request): RedirectResponse
    {
        $request->validate(['status' => 'required|boolean']);

        $partner->title = $request->get('title');
        $partner->link = $request->get('link');
        $partner->status = (bool) $request->get('status');
        $partner->save();

        if ($image = $request->file('image'))
            $partner->addMedia($image)->toMediaCollection('cover');

        return redirect()->back()->with('success', 'Partner updated successfully !');
    }

    public function delete(int $id): RedirectResponse
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully !');
    }
}