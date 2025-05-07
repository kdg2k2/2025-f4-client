<?php

namespace App\Services;

use App\Repositories\OrderDocumentItemRepository;

class OrderDocumentItemService extends BaseService
{
    protected $orderDocumentItemRepository;
    public function __construct()
    {
        $this->orderDocumentItemRepository = app(OrderDocumentItemRepository::class);
    }

    public function createMany(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            return $this->orderDocumentItemRepository->createMany($req);
        });
    }
}
