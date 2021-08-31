<?php

namespace App\Src\Repositories\Web;

use App\Src\Models\ShoppingCart;

class ShoppingCartRepository
{
    public function store($data_for_shopping_cart)
    {
        $cart_from_web = $data_for_shopping_cart['cart'];

        $created_payment = $data_for_shopping_cart['created_payment'];

        $data_for_payment = $data_for_shopping_cart['data_for_payment'];

        $cart = new ShoppingCart;

        /**
         * //TODO
         * Se debe crear usuarios web
         */
        $cart->user_id = 1;
        $cart->email = $data_for_payment['email'];
        $cart->amount = $data_for_payment['amount'];
        $cart->country_id = $cart_from_web->country->id;
        $cart->province_id = $cart_from_web->province->id;
        $cart->city_id = $cart_from_web->city->id;
        $cart->payment_id = $created_payment->id;
        $cart->message = $cart_from_web->message;
        $cart->status = $created_payment->status;
        $cart->shipping_amount = $data_for_shopping_cart['shipping_amount'];
        
        $cart->save();
        
        collect($cart_from_web->products)->map(function($p) use($cart){

            $cart->items()->create([
                'product_id' => $p->item->id,
                'price' =>      $p->item->raw_price,
                'cart_id' =>    $cart->id,
                'quantity' =>   $p->quantity,
            ]);
            
        });

        return $cart;
    }
}

