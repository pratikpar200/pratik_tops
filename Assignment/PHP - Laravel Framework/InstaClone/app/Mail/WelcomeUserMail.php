<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;

    /**
     * Create a new message instance.
     */
    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to InstaClone!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.welcome-user',
            with: [
                'userName' => $this->userName,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message (used here to embed the logo image).
     */
    public function build()
    {
        return $this->markdown('emails.welcome-user')
            ->with([
                'userName' => $this->userName,
            ])
            ->withSymfonyMessage(function ($message) {
                //
            });
    }
}