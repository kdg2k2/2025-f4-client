<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function create(array $request)
    {
        return Order::create($request);
    }

    public function getOrderByCode($code)
    {
        return Order::where('order_code', $code)
            ->with(['packageItems.package', 'payment', 'user'])
            ->first();
    }

    public function update(array $request, $id)
    {
        return Order::where('id', $id)->update($request);
    }
}
