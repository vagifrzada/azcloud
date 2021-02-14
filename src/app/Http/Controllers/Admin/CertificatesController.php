<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CertificatesDataTable;
use App\Entities\Certificate\Certificate;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificatesController extends Controller
{
    public function index(CertificatesDataTable $dataTable)
    {
        return $dataTable->render('admin.certificates.index');
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'image'     => 'required|image',
            'pdf'       => 'required|mimes:pdf',
        ]);

       try {
           DB::beginTransaction();

           $certificate = new Certificate();
           $certificate->setStatus((bool) $request->get('status'));

           foreach ($certificate->translatedAttributes as $attribute)
               foreach ($request->get($attribute) as $locale => $value)
                   $certificate->translateOrNew($locale)->{$attribute} = $value;

           $certificate->save();

           $certificate->addMedia($request->file('image'))
               ->toMediaCollection(Certificate::MEDIA_COVER);

           $certificate->addMedia($request->file('pdf'))
               ->toMediaCollection(Certificate::MEDIA_PDF);

           DB::commit();
           return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully !');
       } catch (Exception $e) {
           DB::rollback();
           logger()->error('Error occurred while storing certificate.', compact('e'));
           return redirect()->route('admin.certificates.index')->with('error', $e->getMessage());
       }
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Certificate $certificate, Request $request): RedirectResponse
    {
        $request->validate([
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
        ]);

       try {
           $certificate->setStatus((bool) $request->get('status'));

           foreach ($certificate->translatedAttributes as $attribute)
               foreach ($request->get($attribute) as $locale => $value)
                   $certificate->translate($locale)->{$attribute} = $value;

           $certificate->save();

           if (filled($image = $request->file('image')))
               $certificate->addMedia($image) ->toMediaCollection(Certificate::MEDIA_COVER);

           if (filled($pdf = $request->file('pdf')))
               $certificate->addMedia($pdf) ->toMediaCollection(Certificate::MEDIA_PDF);

           DB::commit();
           return redirect()->back()->with('success', 'Certificate updated successfully !');
       } catch (Exception $e) {
           DB::rollback();
           logger()->error('Error occurred while updating certificate.', compact('e'));
           return redirect()->route('admin.certificates.index')->with('error', $e->getMessage());
       }
    }

    public function delete($id): RedirectResponse
    {
        $cert = Certificate::findOrFail($id);
        $cert->delete();

        return redirect()->back()->with('success', 'Certificate deleted successfully !');
    }
}