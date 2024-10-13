<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveLeaveRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $leaverequestdata;
    public $person;

    /**
     * Create a new message instance.
     */
    public function __construct($leaverequestdata, $person)
    {
        $this->leaverequestdata = $leaverequestdata;
        $this->person = $person;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Leave Request Status Has Been Updated') // Set the subject
                    ->view('emails.approve-leave-request')
                    ->with([
                        'leaverequestdata' => $this->leaverequestdata,
                        'person' => $this->person,
                    ]);
    }
}
