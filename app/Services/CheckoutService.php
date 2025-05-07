<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CheckoutService extends BaseService
{
    protected $orderService;
    protected $cartDocumentService;
    protected $odiService;
    protected $vnpayService;
    protected $packageUserService;
    public function __construct()
    {
        $this->cartDocumentService = app(CartDocumentService::class);
        $this->odiService = app(OrderDocumentItemService::class);
        $this->vnpayService = app(VnpayService::class);
        $this->orderService = app(OrderService::class);
        $this->packageUserService = app(PackageUserService::class);
    }

    public function checkout($idUser, $req)
    {
        return $this->tryThrow(function () use ($idUser, $req) {
            $orderCode = $this->orderService->genreateCode();
            $cdItems = $this->cartDocumentService->getCartDocument($req['cart_document_ids']);
            $countUsed = $this->packageUserService->countUsed($idUser);
            $cdItemsArray = $cdItems->toArray();
            // Sắp xếp theo document.price giảm dần
            usort($cdItemsArray, function ($a, $b) {
                return $b['document']['price'] <=> $a['document']['price'];
            });

            // Lấy các item được tính tiền (tối đa $countUsed)
            $itemsToCharge = $countUsed < count($cdItemsArray)
                ? array_slice($cdItemsArray, 0, $countUsed)
                : $cdItemsArray;

            // Tính tổng tiền
            $total_amount = array_reduce($itemsToCharge, function ($carry, $item) {
                return $carry + $item['document']['price'];
            }, 0);

            $order = $this->orderService->create([
                'user_id' => $idUser,
                'order_code' => $orderCode,
                'status' => 'pending',
                'total_amount' => $total_amount,
            ]);

            // Lấy danh sách document_id được tính tiền
            $chargedDocumentIds = array_column($itemsToCharge, 'document_id');

            // Tạo danh sách orderDocumentItems
            $orderDocumentItems = [];
            foreach ($cdItems as $item) {
                $price = in_array($item->document_id, $chargedDocumentIds) ? $item->price : 0;
                $orderDocumentItems[] = [
                    'order_id' => $order->id,
                    'document_id' => $item->document_id,
                    'price' => $price,
                ];
            }
            $this->odiService->createMany($orderDocumentItems);
            if ($countUsed < count($cdItemsArray) && $total_amount > 0) {
                $res = $this->vnpayService->createPayment([
                    'order_id' => $order->id,
                    'total_amount' => $total_amount,
                    'order_code' => $orderCode,
                    'info' => "Thanh toán đơn hàng {$orderCode}",
                    'type' => 'billpayment',
                    'return_url' => route('admin.vnpay.return'),
                ]);
            } else {
                $res = ['url' => "http://localhost:8000/"];
            }

            $this->cartDocumentService->deleteCartDocument($req['cart_document_ids']);
            return $res['url'];
        });
    }
}
