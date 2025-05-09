<?php

namespace App\Repositories;

use App\Models\CartDocumentItem;

class CartDocumentItemRepository
{
    public function create(array $data)
    {
        return CartDocumentItem::updateOrCreate($data);
    }

    public function findById($id)
    {
        return CartDocumentItem::with('document')->find($id);
    }

    public function deleteByIdCart(int $idCart, int $id)
    {
        $item = CartDocumentItem::where('id', $id)
            ->where('cart_id', $idCart)
            ->first();
        if ($item) {
            $item->delete();
        }
        return $item;
    }

    public function getCartInIds(array $ids)
    {
        return CartDocumentItem::whereIn('id', $ids)
            ->with('document')
            ->get();
    }

    public function deleteCartInIds(array $ids)
    {
        return CartDocumentItem::whereIn('id', $ids)
            ->delete();
    }
}
