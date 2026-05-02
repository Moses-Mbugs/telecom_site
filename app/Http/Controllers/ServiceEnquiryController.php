<?php

namespace App\Http\Controllers;

use App\Mail\ServiceEnquiryMail;
use App\Models\ServiceEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServiceEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'nullable|string|max:30',
            'service_interest' => 'nullable|string|max:255',
            'message'          => 'required|string|max:2000',
        ]);

        $enquiry = ServiceEnquiry::create($validated);

        try {
            Mail::to($enquiry->email)->send(new ServiceEnquiryMail($enquiry));
        } catch (\Exception $e) {
            // Mail failure should not break the flow
        }

        return back()->with('service_enquiry_success', 'Your enquiry has been submitted. A confirmation email has been sent to ' . $enquiry->email);
    }
}
