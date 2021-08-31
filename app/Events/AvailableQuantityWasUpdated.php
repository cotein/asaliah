<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AvailableQuantityWasUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $response_from_meli;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($response_from_meli)
    {
        $this->response_from_meli = $response_from_meli;
    }

}
