<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Services\DocumentFieldService;

class LayoutService extends Controller
{
    protected $documentFieldService;

    public function __construct()
    {
        $this->documentFieldService = app(DocumentFieldService::class);
    }
    public function categories()
    {
        return $this->tryThrow(function () {
            $doccumentFields = $this->documentFieldService->list(['paginate' => 0]);
            return [
                'doccumentFields' => $doccumentFields,
            ];
        });
    }
}
