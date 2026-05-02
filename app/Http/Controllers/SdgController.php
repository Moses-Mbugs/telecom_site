<?php

namespace App\Http\Controllers;

use App\Models\SdgItem;

class SdgController extends Controller
{
    public function index()
    {
        $sdgItems = SdgItem::orderBy('sdg_number')->get();
        return view('sdg', compact('sdgItems'));
    }
}
