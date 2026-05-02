<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceEnquiry;

class ServiceEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ServiceEnquiry::latest()->get();
        return view('admin.service-enquiries.index', compact('enquiries'));
    }

    public function destroy(ServiceEnquiry $serviceEnquiry)
    {
        $serviceEnquiry->delete();
        return back()->with('success', 'Enquiry deleted.');
    }
}
