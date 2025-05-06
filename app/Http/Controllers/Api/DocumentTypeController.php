<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentType\ListRequest;
use App\Services\DocumentTypeService;

class DocumentTypeController extends Controller
{

    protected $documentTypeService;
    public function __construct()
    {
        $this->documentTypeService = app(DocumentTypeService::class);
    }

    public function index(ListRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $data = $request->validated();
            $res = $this->documentTypeService->list($data);
            return response()->json([
                'data' => $res
            ], 200);
        });
    }
}
