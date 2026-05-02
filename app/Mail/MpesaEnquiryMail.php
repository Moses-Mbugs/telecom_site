<?php

namespace App\Mail;

use App\Models\MpesaEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MpesaEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public MpesaEnquiry $enquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your M-Pesa enquiry – Safe World Telecom',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.mpesa-enquiry',
        );
    }
}
