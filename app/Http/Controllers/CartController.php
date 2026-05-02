<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $variantLabel = trim($request->input('variant_label', ''));
        $variantPrice = $request->input('variant_price');
        $qty          = max(1, (int) $request->input('quantity', 1));

        $price = ($variantLabel && $variantPrice) ? (float) $variantPrice : ($product->discount_price ?? $product->price);
        $name  = $variantLabel ? "{$product->name} ({$variantLabel})" : $product->name;

        if (auth()->check()) {
            $model = Cart::firstOrCreate(
                ['user_id' => auth()->id(), 'status' => 'active'],
                ['user_id' => auth()->id(), 'status' => 'active']
            );
            $item = $model->items()
                ->where('product_id', $product->id)
                ->where('variant', $variantLabel ?: null)
                ->first();
            if ($item) {
                $item->increment('quantity', $qty);
            } else {
                $model->items()->create([
                    'product_id' => $product->id,
                    'name'       => $name,
                    'price'      => $price,
                    'quantity'   => $qty,
                    'image'      => $product->image,
                    'slug'       => $product->slug,
                    'variant'    => $variantLabel ?: null,
                ]);
            }
        } else {
            $cart    = session()->get('cart', []);
            $cartKey = $variantLabel ? "{$id}_{$variantLabel}" : (string) $id;

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] += $qty;
            } else {
                $cart[$cartKey] = [
                    'id'       => $product->id,
                    'name'     => $name,
                    'price'    => $price,
                    'quantity' => $qty,
                    'image'    => $product->image,
                    'slug'     => $product->slug,
                    'variant'  => $variantLabel ?: null,
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

        // Log the order to the database before redirecting
        try {
            $order = Order::create([
                'user_id'      => auth()->check() ? auth()->id() : null,
                'total_amount' => $total,
                'status'       => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price'],
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to save order to database', [
                'user_id' => auth()->check() ? auth()->id() : null,
                'total'   => $total,
                'error'   => $e->getMessage(),
            ]);
        }

        // Clear the cart after logging the order
        if (auth()->check()) {
            $model = Cart::where('user_id', auth()->id())->where('status', 'active')->first();
            if ($model) {
                $model->items()->delete();
                $model->delete();
            }
        } else {
            session()->forget('cart');
        }

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
