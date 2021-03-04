<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Entities\MenuItem\MenuItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class MenuItemController extends Controller
{
    public function index()
    {
        return view('admin.menu_items.index', [
            'menuItems' => MenuItem::query()->oldest('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.menu_items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $menu = new MenuItem();
            $menu->url = $request->get('url');
            $menu->status = (bool) $request->get('status');

            foreach ($menu->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $menu->translateOrNew($locale)->{$attribute} = $value;

            $menu->save();

            if ($request->hasFile('image')) {
                $menu->addMedia($request->file('image'))->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->route('admin.menu-item.index')->with('success', 'Menu item created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing menu item.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(MenuItem $menu_item)
    {
        return view('admin.menu_items.edit', ['menu' => $menu_item]);
    }

    public function update(MenuItem $menu_item, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $menu_item->url = $request->get('url');
            $menu_item->status = (bool) $request->get('status');

            foreach ($menu_item->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $menu_item->translate($locale)->{$attribute} = $value;

            $menu_item->save();

            if ($request->hasFile('image')) {
                $menu_item->addMedia($request->file('image'))->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Menu item updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating menu item.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect()->back()->with('success', 'Menu item deleted successfully !');
    }

    public function updateNestable(Request $request): void
    {
        foreach ($request->get('list', []) as $key => $item) {
            MenuItem::findOrFail($item['id'])->update([ 'order' => $key]);
        }
    }
}