<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class otpInputAttempt
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $email;
    public $otp;

    /**
     * Create a new event instance.
     */
    public function __construct($otp, $email)
    {
        $this->email = $email;
        $this->otp = $otp;
    }

   
}
