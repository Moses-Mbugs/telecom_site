<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = auth()->user()->wishlist()->with('product')->get()
            ->filter(fn ($item) => $item->product !== null)
            ->values();

        // Pass an empty shopPage object or fetch it if needed by the layout
        $shopPage = new \stdClass();
        $shopPage->top_alert_active = false;
        $shopPage->top_alert_content = '';
        $shopPage->top_alert_color = '#dc2626';

        return view('wishlist.index', compact('wishlist', 'shopPage'));
    }

    public function toggle($id)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $exists = $user->wishlist()->where('product_id', $id)->exists();

        if ($exists) {
            $user->wishlist()->where('product_id', $id)->delete();
            $message = 'Removed from wishlist';
            $added   = false;
        } else {
            $user->wishlist()->create(['product_id' => $id]);
            $message = 'Added to wishlist';
            $added   = true;
        }

        return response()->json([
            'message' => $message,
            'added'   => $added,
            'count'   => $user->wishlist()->count(),
        ]);
    }
}
