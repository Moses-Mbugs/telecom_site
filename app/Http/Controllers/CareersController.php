<?php

namespace App\Http\Controllers;

use App\Models\Career;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::where('is_active', true)->latest()->get();
        return view('careers', compact('careers'));
    }
}
