<?php

namespace App\Src\Models;

use App\Src\Models\Status;
use App\Src\Models\PaymentType;
use App\Src\Models\PedidoCliente;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function pay_method()
    {
        return $this->hasOne(PaymentType::class, 'id', 'payment_type_id');
    }

    public function pedido_cliente()
    {
        return $this->belongsTo(PedidoCliente::class, 'pedido_cliente_id', 'id');
    }
}
