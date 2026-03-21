<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function locations()
    {
        $locations = Location::select(['id', 'name', 'address', 'phone', 'image_url'])->get();

        return view('locations', compact('locations'));
    }
}
