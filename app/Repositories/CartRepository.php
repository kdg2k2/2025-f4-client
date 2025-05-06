<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function cart(int $idUser)
    {
        return Cart::where("user_id", $idUser)
            ->with('cartItems.document')
            ->orderByDesc("id")
            ->first();
    }

    public function create(int $idUser)
    {
        return Cart::create(['user_id' => $idUser]);
    }
}
