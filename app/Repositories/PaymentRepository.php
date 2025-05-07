<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function store(array $request)
    {
        return Payment::create($request);
    }

    public function update(array $request, $id)
    {
        return Payment::where('id', $id)->update($request);
    }

    public function findByVnpTxnRef($vnpTxnRef)
    {
        return Payment::where('vnp_TxnRef', $vnpTxnRef)->first();
    }
}
