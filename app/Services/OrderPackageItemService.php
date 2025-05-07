<?php

namespace App\Services;

use App\Repositories\OrderPackageItemRepository;

class OrderPackageItemService extends BaseService
{
    protected $orderPackageItemRepository;
    public function __construct()
    {
        $this->orderPackageItemRepository = app(OrderPackageItemRepository::class);
    }

    public function create(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            return $this->orderPackageItemRepository->create($request);
        });
    }

    public function getOrderPackageItemByOrderId($id)
    {
        return $this->tryThrow(function () use ($id) {
            return $this->orderPackageItemRepository->getOrderPackageItemByOrderId($id);
        });
    }
}
