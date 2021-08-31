<?php

namespace App\Src\Models;

use App\Src\Models\Order;
use App\Src\Models\ShoppingCartDetails;
use Illuminate\Database\Eloquent\Model;


class ShoppingCart extends Model
{
    public function items()
    {
        return $this->hasMany(ShoppingCartItem::class, 'cart_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function total_cart()
    {
        $products =  $this->items->map(function($i){
            return $i->price * $i->quantity;
        })->sum();

        return $products + $this->shipping_amount;
    }
}
