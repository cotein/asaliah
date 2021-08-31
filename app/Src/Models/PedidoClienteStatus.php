<?php

namespace App\Src\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PedidoClienteStatus extends Model
{
    protected $table = 'pedidos_clientes_status';

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
