<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['client_name' => 'John Doe',       'content' => 'Excellent service! The fiber internet is blazing fast and has transformed how we operate.',  'image_url' => null, 'rating' => 5],
            ['client_name' => 'Sarah Wanjiku',  'content' => 'Love the customer support. They resolved my issue in minutes. Highly recommended!',          'image_url' => null, 'rating' => 5],
            ['client_name' => 'Michael Omondi', 'content' => 'Great data plans. Very affordable and reliable for my online classes.',                       'image_url' => null, 'rating' => 5],
            ['client_name' => 'Emily Chen',     'content' => 'Best telecom provider in Kenya. The 5G speeds are incredible.',                              'image_url' => null, 'rating' => 5],
            ['client_name' => 'David Kamau',    'content' => 'The M-Pesa integration is seamless. Makes topping up so easy.',                              'image_url' => null, 'rating' => 5],
            ['client_name' => 'Grace Nyambura', 'content' => 'Reliable connectivity even in rural areas. Thank you Safe World!',                            'image_url' => null, 'rating' => 5],
        ];

        foreach ($testimonials as $data) {
            Testimonial::firstOrCreate(['client_name' => $data['client_name']], $data);
        }
    }
}
