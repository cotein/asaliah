<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WebHookOrderWasReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    
    public function __construct($order)
    {
        $this->order = $order;
    }

    
    public function broadcastOn()
    {   
        return new Channel('hook-order-channel');
    }

    public function broadcastAs()
    {
        return 'Web-Hook-Order-Event';
    }

    public function broadcastWith()
    {
        return ['order' => $this->order];
    }
}
