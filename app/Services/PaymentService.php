<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService extends BaseService
{
    protected $PaymentRepository;
    public function __construct()
    {
        $this->PaymentRepository = app(PaymentRepository::class);
    }

    public function create(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            return $this->PaymentRepository->store($request);
        });
    }

    public function update(array $request)
    {
        return $this->tryThrow(function () use ($request) {
            return $this->PaymentRepository->update($request, $request['id']);
        });
    }

    public function findByVnpTxnRef($vnpTxnRef)
    {
        return $this->tryThrow(function () use ($vnpTxnRef) {
            return $this->PaymentRepository->findByVnpTxnRef($vnpTxnRef);
        });
    }
}
