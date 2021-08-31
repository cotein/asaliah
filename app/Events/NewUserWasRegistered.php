<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewUserWasRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $new_user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($new_user)
    {
        $this->new_user = $new_user;
    }

}
