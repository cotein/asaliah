<?php

namespace App\Listeners;

use App\Events\ShoppingCartWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Src\Models\Order;

class CreateOrder
{
    /**
     * Handle the event.
     *
     * @param  ShoppingCartWasCreated  $event
     * @return void
     */
    public function handle(ShoppingCartWasCreated $data_for_order)
    {
        $created_payment = $data_for_order->data_for_order['created_payment'];

        $order = new Order;

        $order->code= 'AA'; 
        $order->cart_id = $data_for_order->data_for_order['cart']->id; 
        $order->payment_id = $data_for_order->data_for_order['created_payment']->id;
        $order->user_id = 1; 
        $order->status = $data_for_order->data_for_order['created_payment']->status;  

        $order->save();

        $created_payment->order_id = $order->id;

        $created_payment->save();

        $created_payment->refresh();

    }
}
