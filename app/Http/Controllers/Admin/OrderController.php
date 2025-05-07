<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(Request $request)
    {
        return view('admin.order.index');
    }

    public function show($orderCode)
    {
        return view('admin.order.show', [
            'orderCode' => $orderCode,
        ]);
    }
}
