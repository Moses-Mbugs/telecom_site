<?php

namespace App\Http\Controllers;

use App\Services\StrapiService;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    // View cart
    public function index()
    {
        if (auth()->check()) {
            $model = Cart::firstOrCreate(
                ['user_id' => auth()->id(), 'status' => 'active'],
                ['user_id' => auth()->id(), 'status' => 'active']
            );
            $cart = $model->items->map(function (CartItem $i) {
                return [
                    'id' => $i->product_id,
                    'name' => $i->name,
                    'price' => $i->price,
                    'quantity' => $i->quantity,
                    'image' => $i->image,
                    'slug' => $i->slug,
                ];
            })->values()->all();
        } else {
            $cart = session()->get('cart', []);
        }
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

        if (auth()->check()) {
            $model = Cart::firstOrCreate(
                ['user_id' => auth()->id(), 'status' => 'active'],
                ['user_id' => auth()->id(), 'status' => 'active']
            );
            $item = $model->items()->where('product_id', $product->id)->first();
            if ($item) {
                $item->increment('quantity');
            } else {
                $model->items()->create([
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->discount_price ?? $product->price,
                    'quantity' => 1,
                    'image' => $product->image,
                    'slug' => $product->slug,
                ]);
            }
        } else {
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
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    // Redirect to WhatsApp with cart contents
    public function checkoutWhatsApp()
    {
        if (auth()->check()) {
            $model = Cart::where('user_id', auth()->id())->where('status', 'active')->first();
            $cart = $model ? $model->items->map(function (CartItem $i) {
                return [
                    'id' => $i->product_id,
                    'name' => $i->name,
                    'price' => $i->price,
                    'quantity' => $i->quantity,
                ];
            })->values()->all() : [];
        } else {
            $cart = session()->get('cart', []);
        }

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        $phoneNumber = env('WHATSAPP_NUMBER', '254712345678');

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
        if (auth()->check()) {
            $model = Cart::where('user_id', auth()->id())->where('status', 'active')->first();
            if ($model) {
                $model->items()->where('product_id', (int) $id)->delete();
            }
        } else {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Item removed');
    }

    // Update quantity
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if (auth()->check()) {
            $model = Cart::where('user_id', auth()->id())->where('status', 'active')->first();
            if ($model) {
                $item = $model->items()->where('product_id', (int) $id)->first();
                if ($item) {
                    $item->update(['quantity' => (int) $request->quantity]);
                }
            }
        } else {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = (int) $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Cart updated');
    }
}
