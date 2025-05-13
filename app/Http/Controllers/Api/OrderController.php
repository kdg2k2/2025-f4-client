<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\ListRequest;
use App\Services\OrderService;
use App\Services\VnPayService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    protected $vnpayService;
    public function __construct()
    {
        $this->orderService = app(OrderService::class);
        $this->vnpayService = app(VnPayService::class);
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

    public function repay(Request $request, $orderCode)
    {
        return $this->catchAPI(function () use ($request, $orderCode) {
            $order = $this->orderService->getOrderByCode($orderCode);
            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }
            if ($order->status === 'paid' || $order->status === 'complete' || $order->status === 'completed') {
                return response()->json(['message' => 'Order already paid'], 400);
            }
            $result = $this->vnpayService->createPaymentForOrder([
                'order_id' => $order->id,
                'order_code' => $order->order_code,
                'total_amount' => $order->total_amount,
                'info' => 'Thanh toán đơn hàng ' . $order->order_code,
                'type' => $order->type ?? 'other',
                'return_url' => route('admin.vnpay.return'),
            ]);
            return response()->json(['data' => $result], 200);
        });
    }
}
