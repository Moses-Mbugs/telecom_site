<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display the shop page.
     */
    public function index()
    {
        // Later we can fetch products from Supabase here
        // $products = Product::all();

        return view('shop'); // shop.blade.php
    }
}
