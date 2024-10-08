<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateMailEmployee extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Create a new message instance.
     */
    public $new_user;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_user, $password)
    {
        $this->new_user = $new_user;
        $this->password = $password;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Employee Account Created')
                    ->markdown('emails.employee-create');
    }
}
