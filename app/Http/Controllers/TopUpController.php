<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function topup(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);


        return back()->with('success', 'Top-up request received!');
    }
}
