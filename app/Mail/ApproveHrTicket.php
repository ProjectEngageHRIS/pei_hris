<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveHrTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    public function build()
    {
        return $this->subject('Your HR Ticket Status Has Changed')
                    ->view('emails.approve-hr-tickets')
                    ->with([
                        'status' => $this->form->status,
                        'employee' => $this->form->employee,
                    ]);
    }
}