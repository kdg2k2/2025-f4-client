<?php

namespace App\Services;

use App\Repositories\CartRepository;

class CartService extends BaseService
{
    protected $cartRepository;
    protected $cartDocumentService;
    public function __construct()
    {
        $this->cartRepository = app(CartRepository::class);
        $this->cartDocumentService = app(CartDocumentService::class);
    }
    public function cart(int $idUser, array $req)
    {
        return $this->tryThrow(function () use ($req, $idUser) {
            $records = $this->cartRepository->cart($idUser);
            if ($req["paginate"] == 1)
                $records = $this->paginate($records, $req["per_page"], $req["page"]);
            return $records;
        });
    }

    public function addCart(int $idCart, array $req)
    {
        return $this->tryThrow(function () use ($idCart, $req) {
            if ($req['type'] == 'document') {
                $cart = $this->cartDocumentService->addCartDocument($idCart, $req);
            }
            return $cart;
        });
    }

    public function removeCart(int $idCart, array $req)
    {
        return $this->tryThrow(function () use ($idCart, $req) {
            if ($req['type'] == 'document') {
                $cart = $this->cartDocumentService->removeCartDocument($idCart, $req);
            }
            return $cart;
        });
    }
}
