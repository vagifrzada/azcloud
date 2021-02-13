<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DataCentersDataTable;
use App\Entities\DataCenter\DataCenter;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataCentersController extends Controller
{
    public function index(DataCentersDataTable $dataTable)
    {
        return $dataTable->render('admin.data-centers.index');
    }

    public function create()
    {
        return view('admin.data-centers.create');
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
            $dataCenter = new DataCenter();
            $dataCenter->setStatus((bool) $request->get('status'));

            foreach ($dataCenter->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $dataCenter->translateOrNew($locale)->{$attribute} = $value;

            $dataCenter->save();

            // Uploading gallery.
            if (($gallery = $request->file('images')) !== null)
                foreach ($gallery as $image)
                    $dataCenter->addMedia($image)->toMediaCollection(DataCenter::MEDIA_GALLERY);

            DB::commit();

            return redirect()->to('admin/data-centers')->with('success', 'Data center created successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing data center.', compact('e'));
            return redirect()->to('admin/data-centers')->with('error', $e->getMessage());
        }
    }

    public function edit(DataCenter $dataCenter)
    {
        $gallery = [];
        foreach ($dataCenter->getGallery() as $media)
            $gallery[$media->uuid] = $media->getUrl();
        return view('admin.data-centers.edit', compact('dataCenter', 'gallery'));
    }

    public function update(DataCenter $dataCenter, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'status'    => 'required|boolean',
        ]);

        try {
            $dataCenter->setStatus((bool) $request->get('status'));

            foreach ($dataCenter->translatedAttributes as $attribute)
                foreach ($request->get($attribute) as $locale => $value)
                    $dataCenter->translateOrNew($locale)->{$attribute} = $value;

            $dataCenter->save();

            // Uploading gallery.
            if (($gallery = $request->file('images')) !== null)
                foreach ($gallery as $image)
                    $dataCenter->addMedia($image)->toMediaCollection(DataCenter::MEDIA_GALLERY);

            DB::commit();

            return redirect()->back()->with('success', 'Data center updated successfully !');
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while updating data center.', compact('e'));
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $id): RedirectResponse
    {
        $dataCenter = DataCenter::findOrFail($id);
        $dataCenter->delete();
        return redirect()->to('admin/data-centers')->with('success', 'Data center deleted successfully');
    }
}