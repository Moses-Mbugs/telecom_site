<?php

namespace App\Http\Controllers;

use App\Mail\MpesaEnquiryMail;
use App\Models\MpesaEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        try {
            $enquiry = MpesaEnquiry::create($validated);
        } catch (\Exception $e) {
            Log::error('Failed to save M-Pesa enquiry', ['error' => $e->getMessage(), 'data' => $validated]);
            return back()->with('error', 'Sorry, we could not save your enquiry. Please try again or contact us directly on WhatsApp.');
        }

        try {
            Mail::to($enquiry->email)->send(new MpesaEnquiryMail($enquiry));
        } catch (\Exception $e) {
            Log::warning('M-Pesa enquiry mail failed', ['error' => $e->getMessage()]);
        }

        return back()->with('success', 'Your enquiry has been submitted. A confirmation email has been sent to ' . $enquiry->email);
    }
}
