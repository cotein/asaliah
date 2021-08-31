<?php

namespace App\Src\Models;

use App\User;
use App\Src\Models\Address;
use App\Src\Models\Payment;
use App\Src\Models\ShoppingCart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function cart()
    {
        return $this->hasOne(ShoppingCart::class, 'id', 'cart_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

   /*  public function user()
    {
        return $this->hasOne(User::class);
    } */

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

}
