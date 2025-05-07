<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckoutRequest;
use App\Services\CheckoutService;
use App\Services\OrderService;

class CheckoutController extends Controller
{
    protected $checkoutService;
    public function __construct()
    {
        $this->checkoutService = app(CheckoutService::class);
    }
    public function checkout(CheckoutRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $idUser = auth()->user()->id;
            $order = $this->checkoutService->checkout($idUser, $request->all());
            return response()->json([
                'data' => $order
            ], 200);
        });
    }
}
