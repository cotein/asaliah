<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use App\Events\WebHookMessageWasReceived;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WebHookMessageWasReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {   
        return new Channel('hook-message-channel');
    }

    public function broadcastAs()
    {
        return 'Web-Hook-Message-Event';
    }

    public function broadcastWith()
    {
        return ['message' => $this->message];
    }
}
