<?php

namespace App\Http\Controllers;

use App\Models\CompanyService;

class ServicesController extends Controller
{
    public function index()
    {
        $services = CompanyService::where('is_active', true)->orderBy('sort_order')->get();
        return view('services', compact('services'));
    }
}
