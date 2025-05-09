<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Str;

class OrderService extends BaseService
{
    protected $orderRepository;
    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
    }

    public function list(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->orderRepository->list($req);
            if ($req["paginate"] == 1)
                $records = $this->paginate($records, $req["per_page"], $req["page"]);
            return $records;
        });
    }

    public function create(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->orderRepository->create($req);
            return $records;
        });
    }

    public function genreateCode($prefix = 'ORD')
    {
        $uuid = Str::uuid()->toString(); // ví dụ: f47ac10b-58cc-4372-a567-0e02b2c3d479
        $shortUuid = strtoupper(substr(str_replace('-', '', $uuid), 0, 12)); // Lấy 12 ký tự đầu, loại bỏ dấu '-'
        return $this->tryThrow(fn() => "{$prefix}{$shortUuid}");
    }

    public function getOrderByCode($code)
    {
        return $this->tryThrow(function () use ($code) {
            $records = $this->orderRepository->getOrderByCode($code);
            return $records;
        });
    }

    public function paymentStatus($orderCode)
    {
        return $this->tryThrow(function () use ($orderCode) {
            $records = $this->orderRepository->getOrderByCode($orderCode);
            return $records->payment->status;
        });
    }

    public function update(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->orderRepository->update($req, $req['id']);
            return $records;
        });
    }

    public function findById(int $id)
    {
        return $this->tryThrow(function () use ($id) {
            return $this->orderRepository->findById($id);
        });
    }

    public function totalOrder(int $idUser)
    {
        return $this->tryThrow(function () use ($idUser) {
            return $this->list(['user_id' => $idUser, 'paginate' => 0])->count();
        });
    }

    public function totalOrderPaid($idUser)
    {
        return $this->tryThrow(function () use ($idUser) {
            return $this->orderRepository->totalOrderPaid(['paid', 'complete'], $idUser);
        });
    }
}
