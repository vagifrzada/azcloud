<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewsletterDataTables;
use App\Entities\Newsletter;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    public function index(NewsletterDataTables $newsletterDataTables)
    {
        return $newsletterDataTables->render('admin.newsletter.index');
    }

    public function delete(int $id): RedirectResponse
    {
        $record = Newsletter::findOrFail($id);
        $record->delete();
        return redirect()->route('admin.newsletter.index')->with('success', 'Subscription deleted successfully !');
    }
}