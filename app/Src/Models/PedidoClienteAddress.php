<?php

namespace App\Src\Models;

use App\Src\Models\Address;
use Illuminate\Database\Eloquent\Model;

class PedidoClienteAddress extends Model
{
    public function fiscal()
    {
        return $this->hasOne(Address::class, 'id', 'fiscal_address_id');
    }

    public function delivery()
    {
        return $this->hasOne(Address::class, 'id', 'delivery_address_id');
    }
}
