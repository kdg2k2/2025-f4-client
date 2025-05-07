<?php

namespace App\Repositories;

use App\Models\OrderDocumentItem;

class OrderDocumentItemRepository
{

    public function createMany(array $req)
    {
        return OrderDocumentItem::insert($req);
    }
}
