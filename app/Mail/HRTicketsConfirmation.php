<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HRTicketsConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $employeeRecord;
    public $hrticketdata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($employeeRecord, $hrticketdata)
    {
        $this->employeeRecord = $employeeRecord;
        $this->hrticketdata = $hrticketdata;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('HR Ticket Request Confirmation')
                    ->markdown('emails.HRTickets-request-confirmation');
    }
}
