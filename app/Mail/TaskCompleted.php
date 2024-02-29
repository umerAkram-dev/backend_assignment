<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $fullName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('1st Task Done with ' . $this->fullName)
            ->view('emails.task_completed');
    }
}
