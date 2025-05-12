<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function FAQ()
    {
        return view('admin1.support.faq');
    }

    public function PaymentVNPAY()
    {
        return view('admin1.support.paymentVNPAY');
    }
}
