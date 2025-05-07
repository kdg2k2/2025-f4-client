<?php

namespace App\Repositories;

use App\Models\OrderPackageItem;

class OrderPackageItemRepository
{
    public function create(array $request)
    {
        return OrderPackageItem::create($request);
    }

    public function getOrderPackageItemByOrderId($id)
    {
        return OrderPackageItem::where('order_id', $id)->first();
    }
}
