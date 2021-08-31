<?php

namespace App\Src\Repositories\Web;

use App\Src\Models\Order;
use Jenssegers\Date\Date;
use App\Src\Tools\Constant;

class OrderRepository
{
    public function store($data_for_order)
    {
        $created_payment = $data_for_order['created_payment'];
        //dd($created_payment);

        $cart = $data_for_order['cart'];

        $order = new Order;

        $order->code = Constant::NUMBER_ORDER . Date::now()->timestamp; 
        $order->cart_id = $cart->id; 
        $order->payment_id = $created_payment->id;
        $order->user_id = 1; 
        $order->status = $created_payment->status;  

        $order->save();

        
        $created_payment->order_id = $order->id;

        $created_payment->save();

        $created_payment->refresh();

        return $order;
    }
}

