<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;
class ReplyContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function build()
    {
        return $this->subject('Rely Your Message')
        ->markdown('emails.contact_reply')
        ->with(['contact' => $this->contact])
        ->from('yosraatef@gmail.com','noreply');
    }
}
