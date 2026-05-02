<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MpesaEnquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = MpesaEnquiry::latest()->get();
        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function destroy(MpesaEnquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted.');
    }
}
