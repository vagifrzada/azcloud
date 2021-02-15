<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Interfaces\PageRepositoryInterface;
use Throwable;
use App\Entities\Newsletter;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $page = $this->pageRepository->getByIdentity('contact');
        return view('site.pages.contact', [
            'meta' => ($page !== null) ? $page->getMeta() : ['title' => null, 'keywords' => null, 'description' => null],
        ]);
    }

    public function contact(Request $request): JsonResponse
    {
        try {
            $data = $request->validate(['fullname' => 'required', 'phone' => 'required', 'email' => 'required|email', 'message'  => 'required']);
            Mail::to(settings('contact_email'))->send(new ContactFormMail($data));
            return response()->json(['success' => true, 'message' => 'Message has been successfully sent. We will contact you very soon!']);
        } catch (Throwable $e) {
            logger()->error('Error occurred while sending contact email', compact('e'));
            return response()->json(['success' => false, 'message' => "Can't send message. Try later please.", 'status' => 503]);
        }
    }

    public function newsletter(Request $request): JsonResponse
    {
        try {
            $request->validate(['email' => 'required|email']);
            if (Newsletter::where('email', $request->input('email'))->first())
                return response()->json(['success' => false, 'message' => 'You already subscribed to newsletter !']);

            Newsletter::create([
                'email' => $request->input('email'),
                'ip' => $request->getClientIp(),
                'subscribed_at' => date('Y-m-d H:i:s'),
            ]);
            return response()->json(['success' => true, 'message' => 'Subscribed successfully !']);
        } catch (Throwable $e) {
            logger()->error('Error occurred while user subscribed', compact('e'));
            return response()->json(['success' => false, 'message' => "Can't subscribe to newsletter."]);
        }
    }
}