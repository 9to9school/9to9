<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ParentEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;
     public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Parent Enquiry Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    
    public function build()
    {
        return $this->subject('Parent Enquiry Mail')
                    ->markdown('emails.parent_enquiry')
                    ->with([
                        'name' => $this->data['full_name'],
                        'email' => $this->data['email'],
                        'mobile' => $this->data['mobile_number'],
                        'preferred_time' => $this->data['preferred_time'],
                        'question' => $this->data['question_or_concern'] ?? '',
                    ]);
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
