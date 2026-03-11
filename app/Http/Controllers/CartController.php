<?php

namespace App\Http\Controllers;

use App\Services\StrapiService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // View cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Add to cart
    public function add($id)
    {
        $strapi  = app(StrapiService::class);
        $product = $strapi->getProductById((int) $id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->discount_price ?? $product->price,
                'quantity' => 1,
                'image'    => $product->image,
                'slug'     => $product->slug,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    // Redirect to WhatsApp with cart contents
    public function checkoutWhatsApp()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        // Get phone number from environment or config, fallback to default
        $phoneNumber = '254712345678';

        $message = "Hello, I would like to order the following items:\n\n";
        $total = 0;

        foreach ($cart as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
            $message .= "- {$item['name']} (x{$item['quantity']}) - KES " . number_format($itemTotal) . "\n";
        }

        $message .= "\nTotal: KES " . number_format($total);
        $message .= "\n\nPlease advise on payment and delivery.";

        $encodedMessage = urlencode($message);
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";

        return redirect()->away($whatsappUrl);
    }

    // Remove item
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed');
    }

    // Update quantity
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = (int) $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated');
    }
}
