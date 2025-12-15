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

        // ✅ Filter by categories
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        // ✅ Filter by brands
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->brands);
        }

        // ✅ Sorting
        if ($request->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest(); // default
        }

        // ✅ Pagination (important)
        $products = $query->paginate(9)->withQueryString();

        // Load filter data
        $categories = Category::orderBy('name')->get();
        $brands     = Brand::orderBy('name')->get();

        return view('shop', compact('products', 'categories', 'brands'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'brand'])
            ->firstOrFail();

        return view('product-show', compact('product'));
    }
}

