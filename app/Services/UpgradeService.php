<?php

namespace App\Services;

use App\Repositories\UpgradeRepository;

class UpgradeService extends BaseService
{
    protected $upgadeRepository;
    protected $orderService;
    protected $opiService;
    protected $vnpayService;
    public function __construct()
    {
        $this->upgadeRepository = app(UpgradeRepository::class);
        $this->orderService = app(OrderService::class);
        $this->opiService = app(OrderPackageItemService::class);
        $this->vnpayService = app(VnpayService::class);
    }
    public function list(array $req)
    {
        return $this->tryThrow(function () use ($req) {
            $records = $this->upgadeRepository->list($req);
            return $records;
        });
    }

    public function payment(int $idUser, array $req)
    {
        return $this->tryThrow(function () use ($req, $idUser) {
            $orderCode = $this->orderService->genreateCode();
            $packageItem = $this->upgadeRepository->find($req['package_id']);
            $order = $this->orderService->create([
                'user_id' => $idUser,
                'order_code' => $orderCode,
                'status' => 'pending',
                'total_amount' => $packageItem->price,
            ]);
            $this->opiService->create([
                'order_id' => $order->id,
                'package_id' => $req['package_id'],
                'price' => $packageItem->price,
            ]);
            $res = $this->vnpayService->createPayment([
                'order_id' => $order->id,
                'total_amount' => $packageItem->price,
                'order_code' => $orderCode,
                'info' => "Nâng cấp gói {$packageItem->name}",
                'type' => 'billpayment',
                'return_url' => route('admin.vnpay.return'),
            ]);
            return $res['url'];
        });
    }
}
