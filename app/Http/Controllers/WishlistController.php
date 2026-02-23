<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = auth()->user()->wishlist()->with('product')->get();
        return view('wishlist.index', compact('wishlist'));
    }

    public function toggle(Product $product)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $exists = $user->wishlist()->where('product_id', $product->id)->exists();

        if ($exists) {
            $user->wishlist()->where('product_id', $product->id)->delete();
            $message = 'Removed from wishlist';
            $added = false;
        } else {
            $user->wishlist()->create(['product_id' => $product->id]);
            $message = 'Added to wishlist';
            $added = true;
        }

        return response()->json([
            'message' => $message,
            'added' => $added,
            'count' => $user->wishlist()->count()
        ]);
    }
}
