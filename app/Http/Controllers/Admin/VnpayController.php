<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Services\VnPayService;
use Illuminate\Http\Request;

class VnpayController extends Controller
{
    protected $vnpayService;

    public function __construct()
    {
        $this->vnpayService = app(VnPayService::class);
    }

    public function return(Request $request)
    {
        $vnpResponse = $this->vnpayService->vnpayReturn($request->all());
        return redirect()->route('admin.vnpay.result', $vnpResponse['data']['vnp_TxnRef']);
    }

    public function result($orderCode)
    {
        return view('admin.order.result', compact('orderCode'));
    }
    public function ipn(Request $request)
    {
        $res = $this->vnpayService->vnpayIpn($request->all());
        return response()->json([
            'RspCode' => $res['RspCode'],
            'Message' => $res['Message'],
        ], 200);
    }
}
