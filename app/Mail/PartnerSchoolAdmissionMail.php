<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PartnerSchoolAdmissionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $userdata;
    /**
     * Create a new message instance.
     */
    public function __construct($userdata)
    {
         $this->userdata = $userdata;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
         return new Envelope(
            subject: 'Admission Enquiry',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.partner_school_admission',
            with: ['userdata' => $this->userdata],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
