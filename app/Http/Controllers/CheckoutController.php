<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout.index', compact('cart', 'total'));
    }

    // Handle checkout (NO payment yet)
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'location' => 'required|string|max:255',
        ]);

        // For now: just store order data in session
        session()->put('checkout_details', $request->only([
            'full_name', 'phone', 'email', 'location'
        ]));

        return redirect()->route('checkout.index')
            ->with('success', 'Order details captured. Payment coming next.');
    }
}
