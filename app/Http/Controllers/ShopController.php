<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->input('brand'));
        }

        if ($request->filled('featured')) {
            $query->where('is_featured', true);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $products         = $query->paginate(9)->withQueryString();
        $categories       = Category::all();
        $brands           = Brand::all();
        $featuredProducts = Product::with(['category', 'brand'])->where('is_featured', true)->orderBy('created_at', 'desc')->take(8)->get();
        $deals            = Product::with(['category', 'brand'])->whereNotNull('deal_end_time')->where('deal_end_time', '>', now())->orderBy('deal_end_time', 'asc')->take(4)->get();
        $flashSales       = Product::with(['category', 'brand'])->whereNotNull('discount_price')->orderBy('created_at', 'desc')->take(4)->get();
        $shopPage         = null;

        $shopVideo = \App\Models\HomepageSetting::get('shop_video');
        $shopVideoTitle = \App\Models\HomepageSetting::get('shop_video_title');
        $shopVideoText = \App\Models\HomepageSetting::get('shop_video_text');

        return view('shop', compact(
            'products',
            'categories',
            'brands',
            'featuredProducts',
            'deals',
            'flashSales',
            'shopPage',
            'shopVideo',
            'shopVideoTitle',
            'shopVideoText'
        ));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'brand'])->where('slug', $slug)->firstOrFail();

        $brands     = Brand::all();
        $flashSales = Product::with(['category', 'brand'])->whereNotNull('discount_price')->orderBy('created_at', 'desc')->take(1)->get();

        $relatedProducts = collect();
        if ($product->category_id) {
            $relatedProducts = Product::with(['category', 'brand'])
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();
        }

        $shopPage = null;

        $reviewsQuery = $product->reviews()->where('is_approved', true)->with('user')->latest();
        $reviews = $reviewsQuery->get();
        $reviewsCount = $reviews->count();
        $reviewsAverage = $reviewsCount > 0 ? round($reviews->avg('rating'), 1) : 0;

        return view('product-show', compact('product', 'relatedProducts', 'shopPage', 'brands', 'flashSales', 'reviews', 'reviewsCount', 'reviewsAverage'));
    }
}
