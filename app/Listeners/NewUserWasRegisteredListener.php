<?php

namespace App\Listeners;

use App\User;
use App\Mail\NewUserWasRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\NewUserWasRegistered as NewUserWasRegisteredEvent;

class NewUserWasRegisteredListener
{
    const ADMIN_USER = 1;
    
    protected $admin_user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->admin_user = User::where('type_user_id', self::ADMIN_USER)->get()->first();
    }

    /**
     * Handle the event.
     *
     * @param  NewUserWasRegistered  $event
     * @return void
     */
    public function handle(NewUserWasRegisteredEvent $event)
    {
        Mail::to($this->admin_user->email)
            ->send(new NewUserWasRegistered($event->new_user, $this->admin_user));
    }
}
