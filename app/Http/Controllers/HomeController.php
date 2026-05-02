<?php

namespace App\Http\Controllers;

use App\Models\HomepageSetting;
use App\Models\Location;
use App\Models\Partner;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $keys = [
            'hero_title', 'hero_subtitle', 'hero_image', 'hero_video',
            'journey_title', 'journey_text', 'journey_image',
            'plans_title', 'plans_text', 'plans_image', 'plans_video',
            'why_us_1_title', 'why_us_1_text',
            'why_us_2_title', 'why_us_2_text',
            'why_us_3_title', 'why_us_3_text',
        ];

        $settings = HomepageSetting::whereIn('key', $keys)->pluck('value', 'key');

        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $partners = Partner::where('is_active', true)->latest()->get();

        return view('welcome', compact('settings', 'testimonials', 'partners'));
    }

    public function locations()
    {
        $locations = Location::select(['id', 'name', 'address', 'phone', 'image_url', 'map_embed_url'])->get();

        return view('locations', compact('locations'));
    }
}
