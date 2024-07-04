<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeaveRequestConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $employeeRecord;
    public $leaveRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($employeeRecord, $leaveRequest)
    {
        $this->employeeRecord = $employeeRecord;
        $this->leaveRequest = $leaveRequest;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Leave Request Confirmation')
                    ->markdown('emails.leave-request-confirmation');
    }
}
