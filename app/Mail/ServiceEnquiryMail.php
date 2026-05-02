<?php

namespace App\Mail;

use App\Models\ServiceEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServiceEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ServiceEnquiry $enquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Service Enquiry Received – Safe World Telecom',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.service-enquiry',
        );
    }
}
