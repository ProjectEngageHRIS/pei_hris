<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class bannedAccount
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $employee_id;
    /**
     * Create a new event instance.
     */
    public function __construct($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    
}
