<?php

namespace App\Events;

use App\Src\Models\PedidoCliente;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PedidoClienteStatusUpdate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pedido;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PedidoCliente $pedido)
    {
        $this->pedido = $pedido;
    }
   
}
