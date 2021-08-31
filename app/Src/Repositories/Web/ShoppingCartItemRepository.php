<?php

namespace App\Src\Repositories\Web;

use App\Src\Models\ShoppingCart;

class ShoppingCartItemRepository
{
    public function store($payment, $cart)
    {
        collect($payment['cart']->products)->map(function($p) use($cart){

            $cart->items()->create([
                'product_id' => $p->item->id,
                'price' =>      $p->item->raw_price,
                'cart_id' =>    $cart->id,
                'quantity' =>   $p->quantity,
            ]);
            
        });
    }
}

