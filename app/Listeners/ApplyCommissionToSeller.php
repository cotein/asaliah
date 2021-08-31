<?php

namespace App\Listeners;

use App\Src\Models\Status;
use App\Src\Models\Commission;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PedidoClienteStatusUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyCommissionToSeller
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PedidoClienteStatusUpdate  $event
     * @return void
     */
    public function handle(PedidoClienteStatusUpdate $event)
    {
        $commission = new Commission;

        $pedido = $event->pedido;

        $commission->pedido_cliente_id = $pedido->id;
        $commission->user_id = auth()->user()->id;
        $commission->status_id = Status::ACTIVO;
        $commission->pay_method_id = $pedido->pay_method;
        $commission->base_imponible = $pedido->base_imponible();
        $commission->percentage = $pedido->payment_type->percentage;
        $commission->commission = ($pedido->total * $pedido->payment_type->percentage) /100;

        $commission->save();

    }
}
