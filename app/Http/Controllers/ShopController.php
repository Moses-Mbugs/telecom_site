<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // Base query
        $query = Product::query()->with(['category', 'brand']);

        // ✅ Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('brand', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // ✅ Filter by category (singular)
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        // ✅ Filter by categories (plural/array)
        if ($request->filled('categories')) {
            $query->whereIn('category_id', (array)$request->categories);
        }

        // ✅ Filter by brand (singular)
        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }
        // ✅ Filter by brands (plural/array)
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', (array)$request->brands);
        }

        // ✅ Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', true);
        }

        // ✅ Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // ✅ Sorting
        if ($request->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest(); // default
        }

        // ✅ Pagination
        $products = $query->paginate(9)->withQueryString();

        // Load filter data
        $categories = Category::orderBy('name')->get();
        $brands     = Brand::withCount('products')->orderBy('name')->get();

        // Featured Products (8 items) - For the Carousel
        $featuredProducts = Product::where('is_featured', true)
            ->with(['category', 'brand'])
            ->latest()
            ->take(8)
            ->get();

        // Latest Deals
        $deals = Product::whereNotNull('deal_end_time')
            ->where('deal_end_time', '>', now())
            ->with(['category', 'brand'])
            ->orderBy('deal_end_time', 'asc')
            ->take(4)
            ->get();

        return view('shop', compact('products', 'categories', 'brands', 'featuredProducts', 'deals'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'brand'])
            ->firstOrFail();

        return view('product-show', compact('product'));
    }
}
