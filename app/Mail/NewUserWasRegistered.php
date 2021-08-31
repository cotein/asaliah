<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserWasRegistered extends Mailable
{
    use Queueable, SerializesModels;

    const ADMIN_USER = 1;

    public $admin_user;
    
    public $new_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_user, $admin_user)
    {
        $this->new_user = $new_user;
        
        $this->admin_user = $admin_user;
        

        //dd($p->pluck('email')->toArray());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(env('APP_NAME') . ' - Ususario dado de alta')
            ->view('app.emails.new-user-was-registered');
    }
}
