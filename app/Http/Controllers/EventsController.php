<?php

namespace App\Http\Controllers;

use App\Models\CompanyEvent;

class EventsController extends Controller
{
    public function index()
    {
        $events = CompanyEvent::latest()->get();
        return view('events', compact('events'));
    }
}
