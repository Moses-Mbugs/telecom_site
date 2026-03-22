<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use App\Models\Product;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products'     => Product::count(),
            'testimonials' => Testimonial::count(),
            'settings'     => HomepageSetting::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
