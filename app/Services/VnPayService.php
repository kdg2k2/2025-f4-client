<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VnPayService extends BaseService
{
    protected $paymentService;
    protected $removeVietnameseAccent;
    protected $orderService;
    protected $puService;
    protected $emailService;
    protected $opiService;
    protected $ddService;
    protected $odiService;


    public function __construct()
    {
        $this->paymentService = app(PaymentService::class);
        $this->removeVietnameseAccent = app(RemoveVietnameseAccent::class);
        $this->orderService = app(OrderService::class);
        $this->puService = app(PackageUserService::class);
        $this->emailService = app(EmailService::class);
        $this->opiService = app(OrderPackageItemService::class);
        $this->ddService = app(DocumentDownloadService::class);
        $this->odiService = app(OrderDocumentItemService::class);
    }

    public function createPayment(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            if (empty($request['return_url']))
                throw new Exception('return_url is required');
            if (filter_var($request['return_url'], FILTER_VALIDATE_URL) == false)
                throw new Exception('return_url is not a valid url');

            $payment = $this->paymentService->create([
                'order_id' => $request['order_id'],
                'vnp_TxnRef' => $request['order_code'],
                'vnp_Amount' => $request['total_amount'],
                'status' => 'pending',
            ]);

            $ipClient = $this->getClientIp();
            $nowDate = date('YmdHis');
            $data = [
                'vnp_Version' => '2.1.0',
                'vnp_TmnCode' => config('vnpay.vnp_TmnCode'),
                'vnp_Amount' => $payment->vnp_Amount * 100,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => $nowDate,
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $ipClient,
                'vnp_Locale' => 'vn',
                'vnp_OrderInfo' => $this->removeVietnameseAccent->stringToSlug($request['info']),
                'vnp_OrderType' => $request['type'],
                'vnp_ReturnUrl' => $request['return_url'],
                'vnp_TxnRef' => $payment->vnp_TxnRef,
                'vnp_ExpireDate' => date('YmdHis', strtotime($nowDate . '+30 minutes')),
            ];

            $make = $this->makeHashHtttQuery($data);
            $query = $make['query'];
            $secureHash = $make['secureHash'];
            $url = config('vnpay.vnp_Url') . '?' . $query . '&vnp_SecureHash=' . $secureHash;

            ksort($data);
            Log::channel('vnpay')->info('VNPAY PAYMENT URL payload:',  [
                'ip' => $ipClient,
                'time' => $this->getCurrentTime(),
                'request' => $data,
            ]);

            Log::info("VNPAY PAYLOAD:". $url);
            return [
                'payment' => $payment,
                'url' => $url,
            ];
        });
    }

    public function vnpayReturn(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            Log::channel('vnpay')->info('VNPAY RETURN payload:',  [
                'ip' => $this->getClientIp(),
                'time' => $this->getCurrentTime(),
                'request' => $request,
            ]);

            $formatted = $this->formatVnpayRequest($request);
            $vnpData = $formatted['request'];
            $vnpSecureHash = $formatted['vnpSecureHash'];

            $make = $this->makeHashHtttQuery($vnpData);
            $secureHash = $make['secureHash'];

            if ($secureHash != $vnpSecureHash)
                return [
                    'data' => null,
                    'status' => 400,
                    'message' => 'Giao dịch không hợp lệ',
                ];

            $success = $request['vnp_ResponseCode'] == '00';

            return [
                'data' => $request,
                'status' => $success ? 200 : 201,
                'message' => $success ? 'Giao dịch thành công' : 'Giao dịch thất bại',
            ];
        });
    }

    public function vnpayResult(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            $order = $this->orderService->getOrderByCode($request['order_code']);
            if (empty($order))
                throw new Exception('Order not found');
            return $order;
        });
    }


    public function vnpayIpn(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            $ipClient = $this->getClientIp();
            $currentTime = $this->getCurrentTime();

            Log::channel('vnpay')->info('VNPAY IPN payload:',  [
                'ip' => $ipClient,
                'time' => $currentTime,
                'request' => $request,
            ]);

            if (!$this->isAllowedVnpayIp($ipClient)) {
                Log::channel('vnpay')->warning('VNPAY IPN blocked unauthorized IP', [
                    'ip' => $ipClient,
                    'time' => $currentTime,
                ]);

                $request['vnp_ResponseCode'] = '99';
            }

            if ($request['vnp_ResponseCode'] == '99')
                return [
                    'RspCode' => '99',
                    'Message' => 'Unknow error',
                ];

            $format = $this->formatVnpayRequest($request);
            $request = $format['request'];
            $vnpSecureHash = $format['vnpSecureHash'];

            $make = $this->makeHashHtttQuery($request);
            $secureHash = $make['secureHash'];

            if ($secureHash != $vnpSecureHash)
                return [
                    'RspCode' => '97',
                    'Message' => 'Invalid checksum',
                ];

            $payment = $this->paymentService->findByVnpTxnRef($request['vnp_TxnRef']);
            if (!$payment)
                return [
                    'RspCode' => '01',
                    'Message' => 'Order not found',
                ];

            $amount = $request['vnp_Amount'] / 100;
            if ($amount != $payment->vnp_Amount)
                return [
                    'RspCode' => '04',
                    'Message' => 'Invalid amount',
                ];

            if ($payment->status == 'success') {
                return [
                    'RspCode' => '02',
                    'Message' => 'Order already confirmed',
                ];
            }

            if ($payment->status == 'pending') {
                $newStatus = $request['vnp_ResponseCode'] == '00' ? 'success' : 'failed';
                $this->paymentService->update([
                    'id' => $payment->id,
                    'status' => $newStatus,
                    'vnp_ResponseCode' => $request['vnp_ResponseCode'],
                    'vnp_TransactionNo' => $request['vnp_TransactionNo'] ?? null,
                    'vnp_BankCode' => $request['vnp_BankCode'] ?? null,
                ]);

                if ($newStatus == 'success') {
                    $this->orderService->update([
                        'id' => $payment->order_id,
                        'status' => 'paid',
                    ]);
                    if ($payment->order->type == 'package') {
                        $item = $this->opiService->getOrderPackageItemByOrderId($payment->order_id);
                        if (empty($item))
                            return [
                                'RspCode' => '01',
                                'Message' => 'Order package item not found',
                            ];
                        $this->handleAfterPaySuccessForPackage([
                            'user_id' => $payment->order->user_id,
                            'package_id' => $item->package_id,
                            'downloads_remaining' => $item->package->download_document_limit,
                            'start_date' => $this->getCurrentTime(),
                            'end_date' => date('Y-m-d', strtotime($this->getCurrentTime() . '+' . $item->package->duration_days . ' days')),
                        ], $request['vnp_TxnRef']);
                    } else {
                        $items = $this->odiService->getItemsPriceThanZero($payment->order_id);
                        if (empty($items))
                            return [
                                'RspCode' => '01',
                                'Message' => 'Order document item not found',
                            ];
                        $this->handleAfterPaySuccessForNone($items->toArray(), $payment->order_id);
                    }
                }
            }

            return [
                'RspCode' => '00',
                'Message' => 'Confirm Success',
            ];
        });
    }

    protected function isAllowedVnpayIp($ip): bool
    {
        $allowedIps = [
            // Test IPs
            '113.160.92.202',
            '203.205.17.226',
            '202.93.156.34',
            '103.220.84.4',
            // Production IPs
            '113.52.45.78',
            '116.97.245.130',
            '42.118.107.252',
            '113.20.97.250',
            '203.171.19.146',
            '103.220.87.4',
            '103.220.86.4',
            '103.220.86.10',
            '103.220.87.10',
            '103.220.86.139',
            '103.220.87.139',
        ];

        if ($this->isLocal()) {
            array_push($allowedIps, request()->ip());
        }
        return in_array($ip, $allowedIps);
    }

    protected function getClientIp()
    {
        return request()->ip();
    }
    protected function makeHashHtttQuery(array $data)
    {
        ksort($data);
        $query = http_build_query($data);
        return [
            'query' => $query,
            'secureHash' => hash_hmac('sha512', $query, config('vnpay.vnp_HashSecret')),
        ];
    }
    public function getCurrentTime()
    {
        return date('Y-m-d H:i:s');
    }

    protected function formatVnpayRequest(array $request)
    {
        $vnpSecureHash = $request['vnp_SecureHash'] ?? null;
        if (empty($vnpSecureHash))
            $vnpSecureHash = $request['data'] ? $request['data']['vnp_SecureHash'] : null;

        unset($request['vnp_SecureHash']);
        return [
            'vnpSecureHash' => $vnpSecureHash,
            'request' => $request,
        ];
    }
    protected function handleAfterPaySuccessForPackage($dataPu, $orderCode)
    {
        $packageUser = $this->puService->create($dataPu);
        $this->sendMailPaymentSuccess(
            $packageUser->user->email,
            $orderCode
        );
    }

    protected function handleAfterPaySuccessForNone(array $items, $orderId)
    {
        $ddItems = [];
        foreach ($items as $item) {
            $ddItems[] = [
                'order_id' => $orderId,
                'document_id' => $item['document_id'],
                'code' => Str::uuid(),
                'expires_at' => now()->addDays(2),
                'ip_address' => request()->ip(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $this->ddService->createMany($ddItems);
        // $this->sendMailPaymentSuccess();
    }

    protected function sendMailPaymentSuccess($email, $orderCode)
    {
        $this->emailService->sendMail(
            'emails.payment',
            'Thanh toán thành công',
            [$email],
            [
                'order_code' => $orderCode,
            ],
            []
        );
    }
}
