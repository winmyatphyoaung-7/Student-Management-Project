<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
   
     */
    public function build()
    {
        return $this->subject('Welcome Mail!')->markdown('admin.mail.mail')->with('user', $this->user);
    } 
}
