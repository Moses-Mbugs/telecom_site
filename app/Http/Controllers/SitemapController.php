<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $staticUrls = [
            ['url' => route('welcome'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('about'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('locations'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('services'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('shop'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('careers'), 'priority' => '0.5', 'changefreq' => 'weekly'],
            ['url' => route('events'), 'priority' => '0.5', 'changefreq' => 'weekly'],
            ['url' => route('sdg'), 'priority' => '0.4', 'changefreq' => 'monthly'],
            ['url' => route('after-sale-support'), 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        $products = Product::query()
            ->select('slug', 'updated_at')
            ->orderByDesc('updated_at')
            ->get()
            ->map(function (Product $product) {
                return [
                    'url' => route('product.show', $product->slug),
                    'lastmod' => $product->updated_at?->toAtomString(),
                    'priority' => '0.8',
                    'changefreq' => 'weekly',
                ];
            });

        $urls = collect($staticUrls)->merge($products);

        return Response::make(
            view('sitemap', ['urls' => $urls])->render(),
            200,
            ['Content-Type' => 'text/xml']
        );
    }
}
