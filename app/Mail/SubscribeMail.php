<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $name, $email, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email, $name, $message)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.subscribe',
        ['email' => $this->email,'name' => $this->name,'subjects' => $this->subject,'message' => $this->message])
        ->subject( config('app.name'). ' - '.$this->subject);
    }
}
