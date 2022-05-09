<?php

namespace App\Orders;

use App\Billing\PaymentGateway;
use GuzzleHttp\Psr7\Message;

class OrderDetails
{

    private $payment_gateway;
    public function __construct(PaymentGateway $payment_gateway)
    {
        $this->payment_gateway=$payment_gateway;
    }

    public function all()
    {
        // $this->payment_gateway->setDiscount(500);
        
        return [
            'name' => 'Alexa',
            'address' => 'ms-1 coder street',
        ];
    }

    public function hello(  )
    {   
        return 'hello how are you';
    }

}