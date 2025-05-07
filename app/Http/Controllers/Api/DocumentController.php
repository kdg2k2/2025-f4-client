<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\ListRequest;
use App\Services\DocumentService;

class DocumentController extends Controller
{
    protected $documentService;
    public function __construct()
    {
        $this->documentService = app(DocumentService::class);
    }
    public function index(ListRequest $req) {
        return $this->catchAPI(function () use ($req) {
            $data = $req->validated();
            $res = $this->documentService->list($data);
            return response()->json([
                'data' => $res
            ], 200);
        });
    }

    public function show($id) {
        return $this->catchAPI(function () use ($id) {
            $res = $this->documentService->view($id);
            return response()->json([
                'data' => $res
            ], 200);
        });
    }
}
