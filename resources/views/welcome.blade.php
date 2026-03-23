<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Safe World Telecom - Modern telecom solutions for the future">
    <title>{{ config('app.name', 'Safe World Telecom') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#253748',
                        secondary: '#7e7f74',
                        accent: '#a02b2b',
                        neutral: '#f1f5f9',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(102, 126, 234, 0.4)',
                        'glow-lg': '0 0 40px rgba(102, 126, 234, 0.6)',
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }
        ::-webkit-scrollbar-track {
            background: #1e293b;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #253748, #7e7f74);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #7e7f74, #253748);
        }
        /* Hide Scrollbar for specific elements */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #4BA261FF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Marquee Animation */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 40s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-neutral text-gray-900 antialiased">

    {{-- 1. Hero Section --}}
    <section class="relative h-screen flex flex-col items-center justify-center overflow-hidden" id="hero">

        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            @php $heroImage = $settings['hero_image'] ?? 'images/hero.jpg'; @endphp
            <img src="{{ Str::startsWith($heroImage, 'http') ? $heroImage : asset('storage/' . $heroImage) }}" alt="Safe World Telecom Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div> {{-- Dark overlay --}}
        </div>

            {{-- Content (Centered & Card) --}}
            <div class="relative z-10 text-center px-4 max-w-4xl mx-auto flex flex-col items-center justify-center h-full pb-20">

                {{-- Glass Card Wrapper --}}
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl max-w-3xl w-full mx-auto transform hover:scale-[1.01] transition duration-500">
                    {{-- Logo --}}
                    <div class="mb-8">
                        <img src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World Telecom Logo" class="h-32 md:h-40 object-contain drop-shadow-2xl mx-auto">
                    </div>

                    {{-- Company Name --}}
                    <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight drop-shadow-lg">
                        {{ $settings['hero_title'] ?? 'Safe World Telecom' }}
                    </h1>

                    {{-- Statement --}}
                    <p class="text-base md:text-lg text-gray-200 mb-10 leading-relaxed drop-shadow-md">
                        {{ $settings['hero_subtitle'] ?? 'Experience our latest initiative, and products & services that have been innovated to transform lives of Kenyans.' }}
                    </p>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <a href="#our-story" class="px-8 py-3 bg-purple-600/90 hover:bg-purple-700 text-white rounded-full font-semibold transition duration-300 shadow-glow backdrop-blur-sm">
                            Discover Our Story
                        </a>
                        <a href="{{ route('shop') }}" target="_blank" class="px-8 py-3 bg-white/10 hover:bg-white/20 text-white border border-white/30 rounded-full font-semibold transition duration-300 backdrop-blur-md">
                            Visit Our Shop
                        </a>
                    </div>
                </div>
            </div>

        {{-- Stats Footer (Full Width, Blurred) --}}
        <div class="absolute bottom-0 w-full bg-white/10 backdrop-blur-md border-t border-white/10 z-20 py-6">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div class="transform hover:scale-105 transition duration-300">
                        <span class="block text-2xl md:text-3xl font-bold text-white drop-shadow-md stat-number" data-target="19">0</span>
                        <span class="text-xs md:text-sm text-gray-300 uppercase tracking-wider font-medium">Retail Outlets</span>
                    </div>
                    <div class="transform hover:scale-105 transition duration-300">
                        <span class="block text-2xl md:text-3xl font-bold text-white drop-shadow-md stat-number" data-target="1">0</span>
                        <span class="text-xs md:text-sm text-gray-300 uppercase tracking-wider font-medium">Countries</span>
                    </div>
                    <div class="transform hover:scale-105 transition duration-300">
                        <span class="block text-2xl md:text-3xl font-bold text-white drop-shadow-md stat-number" data-target="19">0</span>
                        <span class="text-xs md:text-sm text-gray-300 uppercase tracking-wider font-medium">Years of Trust</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Story Section --}}
    <section id="our-story" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-12">

                {{-- Left: Photo --}}
                <div class="lg:w-1/2 w-full">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-105 transition duration-500">
                        @php $journeyImage = $settings['journey_image'] ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'; @endphp
                        <img src="{{ Str::startsWith($journeyImage, 'http') ? $journeyImage : asset('storage/' . $journeyImage) }}" alt="Our Story Team" class="w-full h-full object-cover">
                    </div>
                </div>

                {{-- Right: Wording --}}
                <div class="lg:w-1/2 w-full">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">{{ $settings['journey_title'] ?? 'Our Journey of Innovation' }}</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        {{ $settings['journey_text'] ?? 'From humble beginnings to becoming a trusted name in Kenyan telecommunications, Safe World Telecom has always been driven by one mission: connecting people.' }}
                    </p>
                    <a href="{{ route('about') }}" class="inline-block px-8 py-3 bg-purple-700 text-white rounded-full font-semibold hover:bg-purple-800 transition duration-300 shadow-lg">
                        Explore Full Story
                    </a>
                </div>
            </div>

            {{-- Growth Timeline Footer --}}
            <div class="mt-20 pt-10 border-t border-gray-200">
                <div class="flex flex-wrap justify-between items-center text-center gap-8">
                    <div class="flex-1 min-w-[150px]">
                        <div class="text-4xl font-bold text-gray-300 mb-2">2007</div>
                        <div class="text-lg font-semibold text-gray-700">Established</div>
                        <p class="text-sm text-gray-500">The journey began</p>
                    </div>
                    <div class="hidden md:block w-16 h-1 bg-gray-200"></div>
                    <div class="flex-1 min-w-[150px]">
                        <div class="text-4xl font-bold text-purple-300 mb-2">2011</div>
                        <div class="text-lg font-semibold text-gray-700">Expanded</div>
                        <p class="text-sm text-gray-500">First major branch</p>
                    </div>
                    <div class="hidden md:block w-16 h-1 bg-gray-200"></div>
                    <div class="flex-1 min-w-[150px]">
                        <div class="text-4xl font-bold text-purple-500 mb-2">2015</div>
                        <div class="text-lg font-semibold text-gray-700">Nationwide</div>
                        <p class="text-sm text-gray-500">Covering key regions</p>
                    </div>
                    <div class="hidden md:block w-16 h-1 bg-gray-200"></div>
                    <div class="flex-1 min-w-[150px]">
                        <div class="text-4xl font-bold text-purple-700 mb-2">2024</div>
                        <div class="text-lg font-semibold text-gray-700">Digital Era</div>
                        <p class="text-sm text-gray-500">Launching online platform</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Advertisements Section (Slideshow) --}}
    <section class="py-20 bg-white overflow-hidden">

        {{-- Huge Slideshow Card --}}
        <div class="container mx-auto px-6 mb-16">
            <div class="relative w-full h-[400px] md:h-[500px] rounded-3xl overflow-hidden shadow-2xl group">
                {{-- Slide 1 --}}
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100">
                    @if(!empty($settings['plans_video']))
                        <video src="{{ Str::startsWith($settings['plans_video'], 'http') ? $settings['plans_video'] : asset('storage/' . $settings['plans_video']) }}" class="w-full h-full object-cover" autoplay loop muted playsinline></video>
                    @else
                        @php $plansImage = $settings['plans_image'] ?? 'https://images.unsplash.com/photo-1556740758-90de374c12ad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80'; @endphp
                        <img src="{{ Str::startsWith($plansImage, 'http') ? $plansImage : asset('storage/' . $plansImage) }}" class="w-full h-full object-cover" alt="Ad Slide 1">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-10 md:p-16">
                        <span class="px-4 py-1 bg-purple-600 text-white text-sm font-bold rounded-full w-fit mb-4">Featured Offer</span>
                        <h3 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $settings['plans_title'] ?? 'Unlimited Data Plans' }}</h3>
                        <p class="text-gray-200 text-lg md:text-xl max-w-xl">{{ $settings['plans_text'] ?? 'Stay connected without limits. Stream, game, and work with our new affordable unlimited fiber packages.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Quick Top-Up Section (Replaces Take Now, Pay Later) --}}
    <section id="topup" class="py-32 px-6 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500 rounded-full filter blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-pulse-slow"></div>
        </div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Quick <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Top-Up</span>
            </h2>
            <p class="text-xl text-gray-300 mb-12">
                Recharge your line instantly with just one click
            </p>

            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-10 rounded-3xl shadow-2xl">
                <form id="topupForm" class="flex flex-col md:flex-row gap-4">
                    @csrf
                    <input
                        type="tel"
                        id="phoneNumber"
                        placeholder="Enter phone number (e.g., 0712345678)"
                        class="flex-1 px-6 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-all duration-300"
                        required
                    />
                    <button
                        type="submit"
                        class="px-10 py-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-semibold hover:shadow-2xl hover:shadow-purple-500/50 transform hover:scale-105 transition-all duration-300">
                        Top Up Now
                    </button>
                </form>

                <div class="mt-8 flex justify-center gap-8 flex-wrap">
                    <div class="text-white">
                        <p class="text-sm text-gray-400">Instant Processing</p>
                        <p class="font-semibold">✓ Under 5 seconds</p>
                    </div>
                    <div class="text-white">
                        <p class="text-sm text-gray-400">Secure Payment</p>
                        <p class="font-semibold">✓ 256-bit Encryption</p>
                    </div>
                    <div class="text-white">
                        <p class="text-sm text-gray-400">All Networks</p>
                        <p class="font-semibold">✓ 100% Coverage</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Explore Devices & Locations (Map Background Card) --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl h-[500px]">
                {{-- Background Image (Phone with Maps) --}}
                <img src="https://images.unsplash.com/photo-1569336415962-a4bd9f69cd83?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Find a Store" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/60"></div>

                <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-8">
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 max-w-3xl">
                        Explore our latest devices, find a store near you, or discover our corporate solutions today.
                    </h2>
                    <div class="flex flex-col sm:flex-row gap-6 mt-8">
                        <a href="{{ route('locations') }}" target="_blank" class="px-8 py-4 bg-white text-gray-900 rounded-full font-bold hover:bg-gray-100 transition duration-300 shadow-lg">
                            Our Locations
                        </a>
                        <a href="{{ route('shop') }}" target="_blank" class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-bold hover:bg-white hover:text-gray-900 transition duration-300 shadow-lg">
                            Shop Devices
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 6. Why Choose Us (Revamped UI) --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Why Choose <span class="text-purple-600">Us</span></h2>
                <p class="text-xl text-gray-500 max-w-2xl mx-auto">We are committed to providing the best connectivity experience in Kenya.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="group p-8 rounded-3xl bg-gray-50 hover:bg-purple-600 hover:text-white transition-all duration-500 shadow-lg hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">{{ $settings['why_us_1_title'] ?? 'Lightning Fast Speed' }}</h3>
                    <p class="text-gray-600 group-hover:text-purple-100 transition-colors duration-500">
                        {{ $settings['why_us_1_text'] ?? 'Experience blazing-fast network solutions built for modern demands with our cutting-edge 5G technology.' }}
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div class="group p-8 rounded-3xl bg-gray-50 hover:bg-blue-600 hover:text-white transition-all duration-500 shadow-lg hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">{{ $settings['why_us_2_title'] ?? '24/7 Expert Support' }}</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 transition-colors duration-500">
                        {{ $settings['why_us_2_text'] ?? 'Round-the-clock technical assistance from our expert team, always ready to help you whenever you need us.' }}
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div class="group p-8 rounded-3xl bg-gray-50 hover:bg-green-600 hover:text-white transition-all duration-500 shadow-lg hover:shadow-2xl transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 group-hover:text-white transition-colors duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">{{ $settings['why_us_3_title'] ?? 'Affordable Plans' }}</h3>
                    <p class="text-gray-600 group-hover:text-green-100 transition-colors duration-500">
                        {{ $settings['why_us_3_text'] ?? 'High-quality telecom services tailored to every budget without compromising on quality or reliability.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Map Section Anchor --}}
    <div id="map-section"></div>

    {{-- 7. Customer Reviews Section (Marquee) --}}
    <section class="py-20 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
        <div class="container mx-auto px-6 mb-12 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">What Our <span class="text-purple-600">Clients Say</span></h2>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">Real stories from satisfied customers across the country.</p>
        </div>

        <div class="relative w-full overflow-hidden">
            {{-- Gradient Masks for smooth fade out --}}
            <div class="absolute top-0 left-0 w-32 h-full bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>

            <div class="flex w-max animate-marquee">
                @php
                    $avatarColors = ['bg-blue-500', 'bg-purple-500', 'bg-green-500', 'bg-pink-500', 'bg-yellow-500', 'bg-indigo-500'];
                @endphp
                {{-- Set 1 --}}
                <div class="flex">
                    @foreach($testimonials as $index => $testimonial)
                        @php
                            $words = explode(' ', $testimonial->client_name);
                            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                            $color = $avatarColors[$index % count($avatarColors)];
                        @endphp
                        <div class="w-80 md:w-96 p-8 bg-white rounded-3xl shadow-xl mx-4 border border-gray-100 flex flex-col justify-between hover:scale-105 transition-transform duration-300">
                            <div class="mb-4">
                                <div class="flex items-center mb-4">
                                    @if($testimonial->image_url)
                                        <img src="{{ Str::startsWith($testimonial->image_url, 'http') ? $testimonial->image_url : asset('storage/' . $testimonial->image_url) }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 {{ $color }} rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                            {{ $initials }}
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $testimonial->client_name }}</h4>
                                    </div>
                                </div>
                                <div class="flex text-yellow-400 mb-4">
                                    {{ str_repeat('★', min(5, max(0, $testimonial->rating))) }}
                                </div>
                                <p class="text-gray-600 italic">"{{ $testimonial->content }}"</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Set 2 (Duplicate for infinite loop) --}}
                <div class="flex">
                    @foreach($testimonials as $index => $testimonial)
                        @php
                            $words = explode(' ', $testimonial->client_name);
                            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                            $color = $avatarColors[$index % count($avatarColors)];
                        @endphp
                        <div class="w-80 md:w-96 p-8 bg-white rounded-3xl shadow-xl mx-4 border border-gray-100 flex flex-col justify-between hover:scale-105 transition-transform duration-300">
                            <div class="mb-4">
                                <div class="flex items-center mb-4">
                                    @if($testimonial->image_url)
                                        <img src="{{ Str::startsWith($testimonial->image_url, 'http') ? $testimonial->image_url : asset('storage/' . $testimonial->image_url) }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 {{ $color }} rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                            {{ $initials }}
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $testimonial->client_name }}</h4>
                                    </div>
                                </div>
                                <div class="flex text-yellow-400 mb-4">
                                    {{ str_repeat('★', min(5, max(0, $testimonial->rating))) }}
                                </div>
                                <p class="text-gray-600 italic">"{{ $testimonial->content }}"</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white py-16 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500 rounded-full filter blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Footer Top -->
            <div class="grid md:grid-cols-4 gap-10 mb-12">
                <!-- Company Info -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Safe World Telecom
                    </h4>
                    <p class="text-gray-300 mb-6 text-sm leading-relaxed">
                        Connecting Kenya with reliable, high-speed, and affordable telecommunication solutions. Your trusted partner in the digital age.
                    </p>
                    <!-- Newsletter Signup -->
                    <div class="relative">
                        <input type="email" placeholder="Enter your email" class="w-full bg-white/10 border border-white/20 rounded-full py-2 px-4 text-sm text-white placeholder-gray-400 focus:outline-none focus:border-purple-400 transition">
                        <button class="absolute right-1 top-1 bg-purple-600 hover:bg-purple-700 text-white rounded-full p-1.5 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('welcome') }}" class="footer-link text-gray-300 hover:text-purple-400 transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link text-gray-300 hover:text-purple-400 transition">About Us</a></li>
                        <li><a href="{{ route('shop') }}" class="footer-link text-gray-300 hover:text-purple-400 transition">Shop</a></li>
                        <li><a href="#topup" class="footer-link text-gray-300 hover:text-purple-400 transition">Top Up</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Our Services
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="footer-link text-gray-300 hover:text-purple-400 transition">Mobile Data</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-purple-400 transition">Fiber Internet</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-purple-400 transition">M-Pesa Services</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-purple-400 transition">Corporate Solutions</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Contact Us
                    </h4>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center text-gray-300 text-sm">
                            <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Phoenix House, Nairobi
                        </li>
                        <li class="flex items-center text-gray-300 text-sm">
                            <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            +254 727 300 722
                        </li>
                        <li class="flex items-center text-gray-300 text-sm">
                            <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            info@safeworld.co.ke
                        </li>
                    </ul>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    © {{ date('Y') }} Safe World Telecom. All Rights Reserved.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Smooth Scroll & Animations Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Animated Counter
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            };

            updateCounter();
        }

        // Intersection Observer for Stats Animation
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    statsObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stat-number').forEach(el => {
            statsObserver.observe(el);
        });
    </script>
</body>
</html>
