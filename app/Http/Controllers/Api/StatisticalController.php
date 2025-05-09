<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    protected $orderService;

    public function __construct()
    {
        $this->orderService = app(OrderService::class);
    }
    public function index()
    {
        $idUser = auth('api')->user()->id;
        $statistical = [
            [
                "title" => "Tổng số đơn hàng",
                "value" => $this->orderService->totalOrder($idUser),
                'type' => 'order'
            ],
            [
                "title" => "Số tiền đã thanh toán",
                "value" => $this->orderService->totalOrderPaid($idUser),
                'type' => 'dong'
            ],
        ];
        return response()->json(['data' => $statistical], 200);
    }
}
