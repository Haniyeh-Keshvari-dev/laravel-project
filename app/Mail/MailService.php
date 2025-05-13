<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailService extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'خوش آمدید به سایت ما',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.mail',
            with: ['name' => $this->name],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
