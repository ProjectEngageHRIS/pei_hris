<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ItTicketRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $ItEmployee;
    public $employeeRecord;
    public $itticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ItEmployee, $employeeRecord, $itticket)
    {        
        $this->ItEmployee = $ItEmployee;
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
        return $this->subject('IT Ticket Request')
                    ->markdown('emails.it-helpdesk-request');
    }
}
