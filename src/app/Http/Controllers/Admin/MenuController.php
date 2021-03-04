<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Entities\Menu\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu.index', [
            'menu' => Menu::query()->oldest('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array',
            'title.*'   => 'required|string|min:3',
            'url'       => 'required',
            'status'    => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $menu = new Menu();
            $menu->url = $request->get('url');
            $menu->status = (bool) $request->get('status');

            foreach ($menu->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $menu->translateOrNew($locale)->{$attribute} = $value;

            $menu->save();

            DB::commit();
            return redirect()->route('admin.menu.index')->with('success', 'Menu item created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing menu item.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Menu $menu, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array',
            'title.*'   => 'required|string|min:3',
            'url'       => 'required',
            'status'    => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $menu->url = $request->get('url');
            $menu->status = (bool) $request->get('status');

            foreach ($menu->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $menu->translate($locale)->{$attribute} = $value;

            $menu->save();

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
        $menuItem = Menu::findOrFail($id);
        $menuItem->delete();

        return redirect()->back()->with('success', 'Menu item deleted successfully !');
    }

    public function updateNestable(Request $request): void
    {
        foreach ($request->get('list', []) as $key => $item) {
            Menu::findOrFail($item['id'])->update([ 'order' => $key]);
        }
    }
}