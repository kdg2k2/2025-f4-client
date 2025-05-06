<?php

namespace App\Services;

use App\Repositories\CartDocumentItemRepository;

class CartDocumentService extends BaseService
{
    protected $cartDocumentItemRepository;
    public function __construct()
    {
        $this->cartDocumentItemRepository = app(CartDocumentItemRepository::class);
    }

    public function addCartDocument(int $idCart, array $data)
    {
        return $this->tryThrow(function () use ($idCart, $data) {
            $item = $this->cartDocumentItemRepository->create([
                'cart_id' => $idCart,
                'document_id' => $data['document_id'],
            ]);
            $item = $this->cartDocumentItemRepository->findById($item->id);
            return $item;
        });
    }

    public function removeCartDocument(int $idCart, array $data)
    {
        return $this->tryThrow(function () use ($idCart, $data) {
            $item = $this->cartDocumentItemRepository->deleteByIdCart($idCart, $data['id']);
            if ($item) {
                $item->delete();
            }
            return $item;
        });
    }
}
