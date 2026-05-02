<?php

namespace App\Http\Controllers;

use App\Mail\MpesaEnquiryMail;
use App\Models\MpesaEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MpesaEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'position'  => 'required|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'enquiry'   => 'required|string|max:2000',
        ]);

        $enquiry = MpesaEnquiry::create($validated);

        try {
            Mail::to($enquiry->email)->send(new MpesaEnquiryMail($enquiry));
        } catch (\Exception $e) {
            // Mail failure should not break the flow
        }

        return back()->with('success', 'Your enquiry has been submitted. A confirmation email has been sent to ' . $enquiry->email);
    }
}
