<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'comment' => 'required|string|max:2000',
        ]);

        $review = ProductReview::firstOrNew([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
        ]);

        $review->fill([
            'rating' => (int) $validated['rating'],
            'title' => $validated['title'] ?? null,
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);
        $review->save();

        return redirect()->route('product.show', $product->slug)->with('success', 'Thanks! Your review has been submitted.');
    }
}

