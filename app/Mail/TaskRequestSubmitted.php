<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TaskRequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;
    public $assignee;

    public $targetEmployee;
    public $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assignee, $targetEmployee, $task)
    {
        $this->assignee = $assignee;
        $this->targetEmployee = $targetEmployee;
        $this->task = $task;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A New Task Has Been Assigned to You')
                    ->markdown('emails.task');
    }
}
