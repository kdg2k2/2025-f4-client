<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LayoutService;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    protected $layoutService;

    public function __construct()
    {
        $this->layoutService = app(LayoutService::class);
    }
    public function categories(Request $request)
    {
        return $this->catchAPI(function () {
            $data = $this->layoutService->categories();
            return response()->json(['data' => $data], 200);
        });
    }
}
