<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    
    public function store(PaymentGateway $payment_gateway)
    {
        // $payment_gateway = new PaymentGateway('usd');
        dd($payment_gateway->charge(2500));
    }
}
