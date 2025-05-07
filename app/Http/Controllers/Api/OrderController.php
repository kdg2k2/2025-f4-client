<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckoutRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct()
    {
        $this->orderService = app(OrderService::class);
    }

    public function show($orderCode)
    {
        return $this->catchAPI(function () use ($orderCode) {
            $order = $this->orderService->getOrderByCode($orderCode);
            return response()->json([
                'data' => $order
            ], 200);
        });
    }

    public function paymentStatus($orderCode)
    {
        return $this->catchAPI(function () use ($orderCode) {
            $status = $this->orderService->paymentStatus($orderCode);
            return response()->json([
                'data' => $status
            ], 200);
        });
    }
}
