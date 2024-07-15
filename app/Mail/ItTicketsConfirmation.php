<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ItTicketsConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $employeeRecord;
    public $itticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($employeeRecord, $itticket)
    {
        $this->employeeRecord = $employeeRecord;
        $this->itticket = $itticket;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('IT Ticket Request Confirmation')
                    ->markdown('emails.it-helpdesk-confirmation');
    }
}
