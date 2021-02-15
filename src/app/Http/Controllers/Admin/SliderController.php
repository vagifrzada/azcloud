<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use Exception;
use Illuminate\Http\Request;
use App\Entities\Slider\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'image'     => 'required|image',
        ]);

        try {
            DB::beginTransaction();

            $slider = new Slider();
            $slider->status = (bool) $request->get('status');
            $slider->order = (int) $request->get('order');
            $slider->buy_link = $request->get('buy_link');
            $slider->prices_link = $request->get('prices_link');

            foreach ($slider->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $slider->translateOrNew($locale)->{$attribute} = $value;

            $slider->save();

            $slider->addMedia($request->file('image'))->toMediaCollection('cover');

            DB::commit();
            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing slider.', compact('e'));
            return redirect()->route('admin.slider.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Slider $slider, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
        ]);

        try {
            DB::beginTransaction();

            $slider->status = (bool) $request->get('status');
            $slider->order = (int) $request->get('order');
            $slider->buy_link = $request->get('buy_link');
            $slider->prices_link = $request->get('prices_link');

            foreach ($slider->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $slider->translate($locale)->{$attribute} = $value;

            $slider->save();

            if ($image = $request->file('image')) {
                $slider->addMedia($image)->toMediaCollection('cover');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Slider updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating slider.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully');
    }
}