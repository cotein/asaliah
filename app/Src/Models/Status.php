<?php

namespace App\Src\Models;

use App\Src\Models\PedidoCliente;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const ACTIVO = 1;
    const PUBLICADO = 2;
    const PAUSADO = 3;
    const REVISION = 4;
    const NO_PUBLICADO = 5;
    const PENDIENTE = 6;
    const ELIMINADO = 7;
    const PRIMER_CONTACTO = 8;
    const LISTADO = 9;
    const REMITIDO = 10;
    const FACTURADO = 11;
    const EN_PRODUCCION = 12;
    const EN_STOCK = 13;
    const CROSS_OVER = 14;
    const DESPACHADO = 15;
    const ENTREGADO = 16;
    const REPORTADO = 17;
    const PAGADA = 18;
    const CERRADO = 19;
    const A_PAGAR = 20;
    const NOTIFICACION_EN_PROCESO = 21;
    const NOTIFICACION_CONSULTADA = 21;

    
    /* public function pedidos_clientes()
    {
        return $this->belongsToMany(PedidoCliente::class, 'pedidos_clientes_status', 'status_id', 'pedido_cliente_id')->withPivot('description', 'user_id');
    } */
}
