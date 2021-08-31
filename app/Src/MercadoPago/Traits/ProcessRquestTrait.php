<?php

namespace App\Src\MercadoPago\Traits;

use App\Src\Traits\MoneyFormatTrait;
/**
 * 
 */
trait ProcessRequestTrait
{
    use MoneyFormatTrait;

    public function ItemsCart($cart_items)
    {
        return collect($cart_items)->map(function($cart_item){
            return [
                "id"    =>  $cart_item->item->id,
                "title" =>  $cart_item->item->title,
                "picture_url"   =>  $cart_item->item->pictures[0]->secure_url,
                "quantity"  =>  $cart_item->quantity,
                "unit_price"    =>  $this->CurrencyToMySqlFormat($cart_item->item->price)
            ];
        })->toArray();
    }

    public function amountCart($cart_items)
    {
        return collect($cart_items)->map(function($cart_item){
            
            return $this->CurrencyToMySqlFormat($cart_item->item->price) * $cart_item->quantity;

        })->sum();
    }
   
}


