<?php

namespace App\Listeners;

use App\Src\Models\ShoppingCart;
use App\Events\PaymentWasCreated;
use App\Events\ShoppingCartWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateShoppingCart
{
    /**
     * Handle the event.
     *
     * @param  PaymentWasCreated  $event
     * @return void
     */
    public function handle(PaymentWasCreated $data_for_shopping_cart)
    {
        //dd($data_for_shopping_cart);
        $payment = $data_for_shopping_cart->payment;

        $created_payment = $payment['created_payment'];

        $data_for_payment = $payment['data_for_payment'];

        $cart = new ShoppingCart;

        $cart->user_id = 1;
        $cart->email = $payment['cart']->email;
        $cart->amount = $data_for_payment['amount'];
        $cart->country_id = $payment['cart']->country->id;
        $cart->province_id = $payment['cart']->province->id;
        $cart->city_id = $payment['cart']->city->id;
        $cart->payment_id = $created_payment->id;
        $cart->message = $payment['cart']->message;
        $cart->status = $created_payment->status;
        
        $cart->save();

        collect($payment['cart']->products)->map(function($p) use($cart){
            $cart->items()->create([
                'product_id' => $p->item->id,
                'price' =>      $p->item->raw_price,
                'cart_id' =>    $cart->id,
                'quantity' =>   $p->quantity,
            ]);
        });

        $data_for_order = [
            
            'payment' => $payment,

            'created_payment' => $created_payment,

            'data_for_payment' => $data_for_payment,

            'cart' => $cart
        ];

        event(new ShoppingCartWasCreated($data_for_order));
       
    }
}
