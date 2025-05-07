<?php

namespace App\Services;

use Illuminate\Support\Str;
class CheckoutService extends BaseService
{
    protected $orderService;
    protected $cartDocumentService;
    protected $odiService;
    protected $vnpayService;
    protected $packageUserService;
    protected $paymentService;
    protected $ddService;
    public function __construct()
    {
        $this->paymentService = app(PaymentService::class);
        $this->cartDocumentService = app(CartDocumentService::class);
        $this->odiService = app(OrderDocumentItemService::class);
        $this->vnpayService = app(VnpayService::class);
        $this->orderService = app(OrderService::class);
        $this->packageUserService = app(PackageUserService::class);
        $this->ddService = app(DocumentDownloadService::class);
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
                return $a['document']['price'] <=> $b['document']['price'];
            });

            // Lấy các item được tính tiền (tối đa $countUsed)
            $itemsToCharge = $countUsed < count($cdItemsArray)
                ? array_slice($cdItemsArray, 0, count($cdItemsArray) - $countUsed)
                : [];

            // Lấy các item không được tính tiền
            $itemsNotToCharge = $countUsed < count($cdItemsArray)
                ? array_slice($cdItemsArray, count($cdItemsArray) - $countUsed)
                : $cdItemsArray;
            // Tính tổng tiền
            $total_amount = array_reduce($itemsToCharge, function ($carry, $item) {
                return $carry + $item['document']['price'];
            }, 0);
            // Tính tổng tiền cho các item không được tính tiền
            $discount = array_reduce($itemsNotToCharge, function ($carry, $item) {
                return $carry + $item['document']['price'];
            }, 0);

            $order = $this->orderService->create([
                'user_id' => $idUser,
                'order_code' => $orderCode,
                'discount' => $discount,
                'subtotal' => $total_amount + $discount,
                'status' => 'pending',
                'total_amount' => $total_amount,
            ]);

            // Lấy danh sách document_id được tính tiền
            $chargedDocumentIds = array_column($itemsToCharge, 'document_id');

            // Tạo danh sách orderDocumentItems
            $orderDocumentItems = [];
            foreach ($cdItems as $item) {
                $price = in_array($item['document_id'], $chargedDocumentIds) ? $item['document']['price'] : 0;
                $orderDocumentItems[] = [
                    'order_id' => $order->id,
                    'document_id' => $item['document_id'],
                    'price' => $price,
                    'original_price' => $item['document']['price'],
                ];
            }
            $this->odiService->createMany($orderDocumentItems);
            if ($countUsed < count($cdItemsArray) && $total_amount > 0) {
                $orderDocumentItems = array_filter($orderDocumentItems, function ($item) use ($chargedDocumentIds) {
                    return $item['price'] == 0;
                });
                $ddItems = [];
                foreach ($orderDocumentItems as $item) {
                    $ddItems[] = [
                        'order_id' => $order->id,
                        'document_id' => $item['document_id'],
                        'code' => Str::uuid(),
                        'expires_at' => now()->addDays(2),
                        'ip_address' => request()->ip(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                $this->ddService->createMany($ddItems);
                $res = $this->vnpayService->createPayment([
                    'order_id' => $order->id,
                    'total_amount' => $total_amount,
                    'order_code' => $orderCode,
                    'info' => "Thanh toán đơn hàng {$orderCode}",
                    'type' => 'billpayment',
                    'return_url' => route('admin.vnpay.return'),
                ]);
            } else {
                $order->update(['status' => 'complete']);
                $this->paymentService->create([
                    'order_id' => $order->id,
                    'vnp_TxnRef' => $orderCode,
                    'vnp_Amount' => $total_amount,
                    'status' => 'success',
                ]);
                $ddItems = [];
                foreach ($cdItems as $item) {
                    $ddItems[] = [
                        'order_id' => $order->id,
                        'document_id' => $item['document_id'],
                        'code' => Str::uuid(),
                        'expires_at' => now()->addDays(2),
                        'ip_address' => request()->ip(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                $this->ddService->createMany($ddItems);
                $res = ['url' => route('admin.vnpay.result', $orderCode)];
            }
            $this->packageUserService->decrease($idUser, $countUsed < count($cdItemsArray) ? $countUsed : count($cdItemsArray));
            $this->cartDocumentService->deleteCartDocument($req['cart_document_ids']);
            return $res['url'];
        });
    }
}
