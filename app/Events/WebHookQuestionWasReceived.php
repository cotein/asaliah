<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WebHookQuestionWasReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $question;
    
    public function __construct($question)
    {
        $this->question = $question;
    }

    public function broadcastOn()
    {   
        return new Channel('hook-question-channel');
    }

    public function broadcastAs()
    {
        return 'Web-Hook-question-Event';
    }

    public function broadcastWith()
    {
        return ['question' => $this->question];
    }
}
