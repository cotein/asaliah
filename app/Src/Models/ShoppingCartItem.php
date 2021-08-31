<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

use App\Src\Models\ShoppingCart;

class ShoppingCartItem extends Model
{
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    
}
