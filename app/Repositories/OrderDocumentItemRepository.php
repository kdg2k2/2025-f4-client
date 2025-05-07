<?php

namespace App\Repositories;

use App\Models\OrderDocumentItem;

class OrderDocumentItemRepository
{

    public function createMany(array $req)
    {
        return OrderDocumentItem::insert($req);
    }

    public function getItemsPriceThanZero($idOrder)
    {
        return OrderDocumentItem::where('order_id', $idOrder)
            ->where('price', '>', 0)
            ->get();
    }
}
