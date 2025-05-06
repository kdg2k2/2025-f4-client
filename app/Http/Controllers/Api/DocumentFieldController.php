<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentField\ListRequest;
use App\Services\DocumentFieldService;
use Illuminate\Http\Request;

class DocumentFieldController extends Controller
{
    protected $documentFieldService;
    public function __construct()
    {
        $this->documentFieldService = app(DocumentFieldService::class);
    }

    public function index(ListRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $data = $request->validated();
            $res = $this->documentFieldService->list($data);
            return response()->json([
                'data' => $res
            ], 200);
        });
    }
}
