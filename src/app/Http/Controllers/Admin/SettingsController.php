<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Setting;
use Illuminate\Http\Request;
use App\DataTables\SettingsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function index(SettingsDataTable $dataTable)
    {
        return $dataTable->render('admin.settings.index');
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'key'  => 'required|max:50',
            'value' => 'required|max:1000'
        ]);

        Setting::create($validated);

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Configuration created successfully !');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting): RedirectResponse
    {
        $request->validate(['value' => 'required|max:1000']);
        $setting->setValue($request->input('value'))->save();
        return redirect()->back()->with('success', 'Changes saved successfully !');
    }
}