<?php

namespace App\Http\Controllers;

use App\Services\StrapiService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected StrapiService $strapi;

    public function __construct(StrapiService $strapi)
    {
        $this->strapi = $strapi;
    }

    public function index(Request $request)
    {
        $params = array_filter([
            'search'    => $request->input('search'),
            'category'  => $request->input('category'),
            'brand'     => $request->input('brand'),
            'featured'  => $request->input('featured'),
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'sort'      => $request->input('sort'),
        ], fn ($v) => $v !== null && $v !== '');

        $params['page']     = $request->input('page', 1);
        $params['pageSize'] = 9;

        $products         = $this->strapi->getProducts($params);
        $categories       = $this->strapi->getCategories();
        $brands           = $this->strapi->getBrands();
        $featuredProducts = $this->strapi->getFeaturedProducts(8);
        $deals            = $this->strapi->getDeals(4);

        return view('shop', compact('products', 'categories', 'brands', 'featuredProducts', 'deals'));
    }

    public function show($slug)
    {
        $product = $this->strapi->getProductBySlug($slug);

        if (!$product) {
            abort(404);
        }

        return view('product-show', compact('product'));
    }
}
