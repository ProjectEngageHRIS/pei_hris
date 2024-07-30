<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class changePassword
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $employee_id;

   
    public function __construct($email, $employee_id)
    {
        $this->email = $email;
        $this->employee_id = $employee_id;
    }

   
}
