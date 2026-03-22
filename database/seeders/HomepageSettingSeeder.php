<?php

namespace Database\Seeders;

use App\Models\HomepageSetting;
use Illuminate\Database\Seeder;

class HomepageSettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'hero_title'      => 'Safe World Telecom',
            'hero_subtitle'   => 'Experience our latest initiative, and products & services that have been innovated to transform lives of Kenyans.',
            'hero_image'      => 'images/hero.jpg',

            'journey_title'   => 'Our Journey of Innovation',
            'journey_text'    => 'From humble beginnings to becoming a trusted name in Kenyan telecommunications, Safe World Telecom has always been driven by one mission: connecting people. We started with a vision to make technology accessible to everyone, and today, we continue to break barriers and bring the future closer to you.',
            'journey_image'   => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',

            'plans_title'     => 'Unlimited Data Plans',
            'plans_text'      => 'Stay connected without limits. Stream, game, and work with our new affordable unlimited fiber packages.',
            'plans_image'     => 'https://images.unsplash.com/photo-1556740758-90de374c12ad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80',

            'why_us_1_title'  => 'Lightning Fast Speed',
            'why_us_1_text'   => 'Experience blazing-fast network solutions built for modern demands with our cutting-edge 5G technology.',
            'why_us_2_title'  => '24/7 Expert Support',
            'why_us_2_text'   => 'Round-the-clock technical assistance from our expert team, always ready to help you whenever you need us.',
            'why_us_3_title'  => 'Affordable Plans',
            'why_us_3_text'   => 'High-quality telecom services tailored to every budget without compromising on quality or reliability.',
        ];

        foreach ($defaults as $key => $value) {
            HomepageSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
