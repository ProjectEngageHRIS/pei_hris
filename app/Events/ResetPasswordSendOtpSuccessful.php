<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordSendOtpSuccessful
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    /**
     * Create a new event instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
}
