<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewEventCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
        public $event_content, $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $e, User $u)
    {
        //
        $this->event_content=$e;
        $this->user=$u;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address("BC190402071@vu.edu.pk","Muhammad Zeeshan"),
            subject: 'New Event Created Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.NewEventCreated',
//            with: [
//                "link"=>route("event.show",$this->event_content->id)
//            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
