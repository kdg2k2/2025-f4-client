<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckoutRequest;
use App\Http\Requests\Order\ListRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct()
    {
        $this->orderService = app(OrderService::class);
    }

    public function index(ListRequest $request)
    {
        return $this->catchAPI(function () use ($request) {
            $orders = $this->orderService->list([
                ...$request->validated(),
                'user_id' => auth('api')->user()->id,
            ]);
            return response()->json([
                'data' => $orders
            ], 200);
        });
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
