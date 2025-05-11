<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\DocumentFieldService;
use App\Services\DocumentService;

class HomeController extends Controller
{
    protected $documentService;
    protected $documentFieldService;

    public function __construct()
    {
        $this->documentService = app(DocumentService::class);
        $this->documentFieldService = app(DocumentFieldService::class);
    }

    public function index()
    {
        return view('pages.index');
    }

    public function getTerms()
    {
        return view('pages.support.terms');
    }

    public function getPrivacy()
    {
        return view('pages.support.privacy');
    }

    public function getPaymentPrivacy()
    {
        return view('pages.support.PaymentPolicy');
    }

    public function getFAQ()
    {
        return view('pages.support.faq');
    }

    public function getPaymentVNPAY()
    {
        return view('pages.support.vnpay');
    }

    public function getDocument()
    {
        return view('pages.document.index');
    }

    public function getDocumentDetail($id)
    {
        $data = $this->documentService->list([
            "paginate" => 0,
            'field_id' => $id,
        ]);
        $documentField = $this->documentFieldService->getField($id);
        return view('pages.document.detail', [
            'data' => $data,
            'documentField' => $documentField,
        ]);
    }

    public function getMaps()
    {
        return view('pages.maps.index');
    }

    public function getMapsDetail()
    {
        return view('pages.maps.detail');
    }

    public function getLogin()
    {
        return view('pages.auth.login');
    }

    public function getRegister()
    {
        return view('pages.auth.register');
    }

    public function getNotificationDetail($slug)
    {
        if ($slug == 'thong-bao-lich-nghi-le-ngay-30-4-va-ngay-1-5') {
            return view('pages.notification.nghile1');
        }

        if ($slug == 'thong-bao-lich-nghi-le-gio-to-hung-vuong') {
            return view('pages.notification.nghile2');
        }

        if ($slug == 'thong-bao-lich-nghi-tet-duong-lich-nam-2025') {
            return view('pages.notification.nghile3');
        }

        return abort(404);
    }
}
