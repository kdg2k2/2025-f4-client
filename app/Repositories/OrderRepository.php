<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    public function list(array $request)
    {
        return Order::where('user_id', $request['user_id'])
            ->when(isset($request['status']), function ($query) use ($request) {
                return $query->where('status', $request['status']);
            })
            ->orderBy('created_at', 'desc')
            ->with(['packageItems.package', 'payment', 'user', 'documentItems.document'])
            ->get();
    }

    public function create(array $request)
    {
        return Order::create($request);
    }

    public function getOrderByCode($code)
    {
        $order = Order::with([
            'packageItems.package',
            'payment',
            'user',
            'documentItems.document.downloads' => function ($query) {
                // Sau này ta sẽ gán điều kiện lọc `order_id` trong phần `filter` bên dưới
            }
        ])
            ->where('order_code', $code)
            ->first();

        if ($order) {
            // Lọc lại downloads để chỉ giữ các bản có order_id đúng
            $order->documentItems->each(function ($item) use ($order) {
                $item->document->setRelation(
                    'downloads',
                    $item->document->downloads->where('order_id', $order->id)->values()
                );
            });
        }

        return $order;
    }

    public function update(array $request, $id)
    {
        return Order::where('id', $id)->update($request);
    }

    public function findById(int $int)
    {
        return Order::find($int);
    }

    public function totalOrderPaid(array $status, int $idUser)
    {
        return Order::whereIn('status', $status)
            // ->where('user_id', $idUser)
            ->sum('total_amount');
    }
}
