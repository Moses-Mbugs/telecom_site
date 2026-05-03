{{-- layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Safe World Telecom - Trusted phone retailer with 19 outlets in Kenya. Shop smartphones, M-Pesa integration and expert after-sale support.')">
    <meta name="robots" content="index, follow">
    <title>@yield('title', config('app.name', 'Safe World Telecom'))</title>
    <link rel="canonical" href="{{ config('app.url') . request()->getRequestUri() }}">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('images/safe_world_logo_logo_only.svg') }}" type="image/svg+xml">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/safe_world_logo_cropped_transparent.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/safe_world_logo_cropped_transparent.png') }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') . request()->getRequestUri() }}">
    <meta property="og:site_name" content="Safe World Telecom">
    <meta property="og:title" content="@yield('title', 'Safe World Telecom')">
    <meta property="og:description" content="@yield('meta_description', 'Trusted phone retailer with 19 outlets in Kenya. Shop smartphones, M-Pesa integration services, and expert after-sale support.')">
    <meta property="og:image" content="{{ asset('images/safe_world_logo_cropped_transparent.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_KE">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Safe World Telecom')">
    <meta name="twitter:description" content="@yield('meta_description', 'Trusted phone retailer with 19 outlets in Kenya.')">
    <meta name="twitter:image" content="{{ asset('images/safe_world_logo_cropped_transparent.png') }}">

    <!-- Schema.org Organization structured data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Safe World Telecom",
        "url": "{{ config('app.url') }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('images/safe_world_logo_cropped_transparent.png') }}",
            "width": 500,
            "height": 250
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+254712345678",
            "contactType": "customer service",
            "areaServed": "KE",
            "availableLanguage": "English"
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "KE"
        },
        "numberOfEmployees": {
            "@type": "QuantitativeValue",
            "minValue": 50
        }
    }
    </script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Gradient Background Animation */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .gradient-animate {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        /* Glass Effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dark {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Navbar Styles */
        .navbar-shrink {
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Menu Animation */
        .mobile-menu-enter {
            animation: slideDown 0.3s ease-out;
        }

        /* Link Hover Effect */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #b5342a, #1e3040);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Scroll Progress Bar */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #b5342a, #1e3040);
            z-index: 100000;
            transition: width 0.1s ease;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #1e3040, #7a7a6a);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #b5342a, #1e3040);
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1e3040, #b5342a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(181, 52, 42, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 9998;
            opacity: 0;
            transform: translateY(100px);
        }

        .fab.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fab:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 6px 25px rgba(181, 52, 42, 0.6);
        }

        /* Footer Links Hover */
        .footer-link {
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        .footer-link:hover {
            transform: translateX(5px);
            color: #b5342a;
        }

        /* Loading Animation */
        .loader {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid #253748;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Hamburger Animation */
        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            background: white;
            margin: 5px 0;
            transition: 0.3s;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        /* ============================================
           CRITICAL Z-INDEX FIX FOR NAVBAR & MAP
           ============================================ */

        /* Force navbar to stay on top of everything */
        #navbar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 99999 !important;
            width: 100% !important;
        }

        /* Ensure mobile menu also stays on top */
        #mobile-menu {
            position: relative !important;
            z-index: 99999 !important;
        }

        /* Make sure Leaflet map doesn't overlap navbar */
        #map {
            position: relative !important;
            z-index: 1 !important;
        }

        .leaflet-container {
            z-index: 1 !important;
        }

        .leaflet-pane,
        .leaflet-tile-pane,
        .leaflet-overlay-pane,
        .leaflet-shadow-pane,
        .leaflet-marker-pane,
        .leaflet-tooltip-pane,
        .leaflet-popup-pane {
            z-index: auto !important;
        }

        /* Particles should be below everything */
        #particles-js {
            z-index: 1 !important;
        }

        /* Ensure proper stacking context */
        body {
            padding-top: 0 !important;
        }

        main {
            position: relative !important;
            z-index: 10 !important;
        }

        section {
            position: relative !important;
            z-index: auto !important;
        }

        @stack('styles')
    </style>
</head>
<body class="bg-neutral text-gray-900 antialiased">

    <!-- Scroll Progress Bar -->
    <div id="scroll-progress"></div>

    <!-- Flash Messages -->
    <div class="fixed top-24 left-1/2 transform -translate-x-1/2 z-[100001] w-full max-w-md px-4 pointer-events-none">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-2xl mb-2 animate-slide-down pointer-events-auto flex items-center justify-between border border-green-400">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-white hover:text-green-100 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg shadow-2xl mb-2 animate-slide-down pointer-events-auto flex items-center justify-between border border-red-400">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-white hover:text-red-100 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif
    </div>

    <!-- Navbar -->
    @unless(isset($hideNavbar) && $hideNavbar)
    <nav class="bg-[#1e3040] text-white shadow-lg fixed w-full transition-all duration-300" id="navbar">

        <div class="container mx-auto flex justify-between items-center py-5 px-6">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold flex items-center group">
                <img
                    src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}"
                    alt="Safe World Telecom Logo"
                    class="w-20 h-10 mr-3">
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex space-x-8 items-center">
                <li><a href="/" class="nav-link hover:text-accent transition font-medium">Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link hover:text-accent transition font-medium">About</a></li>
                <li><a href="{{ route('services') }}" class="nav-link hover:text-accent transition font-medium">Services</a></li>
                <li><a href="{{ route('shop') }}" class="nav-link hover:text-accent transition font-medium">Shop</a></li>
                <li>
                    <button onclick="document.getElementById('mpesa-modal').classList.remove('hidden')"
                            class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-full text-sm font-semibold transition-all duration-300 hover:scale-105 shadow-lg shadow-green-500/30">
                        M-Pesa Enquiry
                    </button>
                </li>
                <li>
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 rounded-full font-semibold transition-all duration-300 hover:scale-105 shadow-lg shadow-red-500/30">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2 bg-accent rounded-full font-semibold hover:shadow-glow transition-all duration-300 hover:scale-105">
                            Login
                        </a>
                    @endauth
                </li>
                <li>
                    @php
                        if (auth()->check()) {
                            $cartModel = \App\Models\Cart::where('user_id', auth()->id())->where('status', 'active')->first();
                            $cartItems = $cartModel ? $cartModel->items : collect();
                            $cartCount = $cartItems->sum('quantity');
                            $cartTotal = $cartItems->sum(fn($i) => $i->price * $i->quantity);
                        } else {
                            $cart = session('cart', []);
                            $cartCount = array_sum(array_column($cart, 'quantity'));
                            $cartTotal = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
                        }
                    @endphp
                    <a href="{{ route('cart.index') }}" class="flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-full transition-all duration-300 group">
                        <div class="relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full">{{ $cartCount }}</span>
                            @endif
                        </div>
                        <span class="text-sm font-semibold">
                            @if($cartCount > 0)
                                {{ $cartCount }} {{ Str::plural('item', $cartCount) }} &mdash; KES {{ number_format($cartTotal) }}
                            @else
                                Cart
                            @endif
                        </span>
                    </a>
                </li>
            </ul>

            <!-- Mobile Menu Toggle -->
            <button id="menu-toggle" class="md:hidden hamburger focus:outline-none">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden glass-dark mobile-menu-enter">
            <ul class="space-y-4 px-6 py-6">
                <li><a href="/" class="block hover:text-accent transition font-medium py-2">Home</a></li>
                <li><a href="{{ route('about') }}" class="block hover:text-accent transition font-medium py-2">About</a></li>
                <li><a href="{{ route('services') }}" class="block hover:text-accent transition font-medium py-2">Services</a></li>
                <li><a href="{{ route('shop') }}" class="block hover:text-accent transition font-medium py-2">Shop</a></li>
                <li>
                    <button onclick="document.getElementById('mpesa-modal').classList.remove('hidden'); document.getElementById('mobile-menu').classList.add('hidden');"
                            class="block w-full px-6 py-3 bg-green-600 rounded-full font-semibold text-center text-white hover:bg-green-700 transition-all duration-300">
                        M-Pesa Enquiry
                    </button>
                </li>
                <li>
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="block w-full px-6 py-3 bg-red-600 rounded-full font-semibold text-center hover:bg-red-700 transition-all duration-300">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-6 py-3 bg-accent rounded-full font-semibold text-center hover:shadow-glow transition-all duration-300">
                            Login
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
    @endunless

    <!-- Main content -->
    <main class="{{ (isset($hideNavbar) && $hideNavbar) ? '' : 'pt-20' }}">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1e3040] text-white py-16 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-[#b5342a] rounded-full filter blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#7a7a6a] rounded-full filter blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Footer Top -->
            <div class="grid md:grid-cols-4 gap-10 mb-12">

                <!-- Explore -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-accent">Explore</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('welcome') }}" class="footer-link text-gray-300">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="footer-link text-gray-300">Shop</a></li>
                        <li><a href="{{ route('services') }}" class="footer-link text-gray-300">Our Services</a></li>
                        <li><a href="{{ route('after-sale-support') }}" class="footer-link text-gray-300">After-Sale Support</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-accent">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="footer-link text-gray-300">About Us</a></li>
                        <li><a href="{{ route('careers') }}" class="footer-link text-gray-300">Careers</a></li>
                        <li><a href="{{ route('events') }}" class="footer-link text-gray-300">Our Events</a></li>
                        <li><a href="{{ route('sdg') }}" class="footer-link text-gray-300">SDG &amp; Sustainability</a></li>
                    </ul>
                </div>

                <!-- Find Us -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-accent">Find Us</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('locations') }}" class="footer-link text-gray-300">Our Locations</a></li>
                        <li>
                            <button onclick="document.getElementById('mpesa-modal').classList.remove('hidden')"
                                    class="footer-link text-gray-300 text-left">
                                M-Pesa Enquiry
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Connect -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-accent">Connect</h4>
                    <p class="text-gray-400 text-sm mb-6 leading-relaxed">19 outlets nationwide. Follow us for the latest offers and updates.</p>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-accent transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-accent transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-accent transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-accent transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
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
                    <a href="{{ route('about') }}" class="text-gray-400 hover:text-accent transition">About Us</a>
                    <a href="{{ route('locations') }}" class="text-gray-400 hover:text-accent transition">Find a Store</a>
                    <a href="{{ route('after-sale-support') }}" class="text-gray-400 hover:text-accent transition">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button (Scroll to Top) -->
    <div class="fab" id="scrollToTop">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Main JavaScript -->
    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                this.classList.toggle('active');
            });
        }

        // Scroll Progress Bar
        window.addEventListener('scroll', function() {
            const scrollProgress = document.getElementById('scroll-progress');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            if (scrollProgress) {
                scrollProgress.style.width = scrollPercentage + '%';
            }

            // Show/hide FAB
            const fab = document.getElementById('scrollToTop');
            if (fab) {
                if (scrollTop > 300) {
                    fab.classList.add('visible');
                } else {
                    fab.classList.remove('visible');
                }
            }

            // Navbar shrink on scroll
            const navbar = document.getElementById('navbar');
            if (navbar) {
                if (scrollTop > 50) {
                    navbar.classList.add('navbar-shrink');
                } else {
                    navbar.classList.remove('navbar-shrink');
                }
            }
        });

        // Scroll to Top
        const scrollToTopButton = document.getElementById('scrollToTop');
        if (scrollToTopButton) {
            scrollToTopButton.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    // Close mobile menu if open
                    if (mobileMenu && menuToggle) {
                        mobileMenu.classList.add('hidden');
                        menuToggle.classList.remove('active');
                    }
                }
            });
        });
    </script>

    @stack('scripts')
    @stack('modals')

    {{-- M-Pesa Enquiry Modal --}}
    <div id="mpesa-modal" class="hidden fixed inset-0 z-[200000] flex items-center justify-center px-4">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="document.getElementById('mpesa-modal').classList.add('hidden')"></div>

        {{-- Modal Card --}}
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg z-10 overflow-hidden">
            {{-- Header --}}
            <div class="bg-gradient-to-r from-[#1e3040] to-[#2d4a60] px-8 py-6 flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-7 h-7 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-white font-bold text-lg">M-Pesa Enquiry</h3>
                    </div>
                    <p class="text-gray-300 text-sm">Fill in your details and we will get back to you.</p>
                </div>
                <button onclick="document.getElementById('mpesa-modal').classList.add('hidden')"
                        class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            {{-- Form --}}
            <form action="{{ route('mpesa-enquiry.store') }}" method="POST" class="px-8 py-6 space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required placeholder="John Doe"
                            class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-400 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Position <span class="text-red-500">*</span></label>
                        <input type="text" name="position" required placeholder="e.g. Business Owner"
                            class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-400 focus:border-transparent outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required placeholder="you@example.com"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-400 focus:border-transparent outline-none">
                    <p class="text-xs text-gray-400 mt-1">A confirmation email will be sent here.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Workplace <span class="text-xs text-gray-400">(optional)</span></label>
                    <input type="text" name="workplace" placeholder="Company or organisation name"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-400 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Your Enquiry <span class="text-red-500">*</span></label>
                    <textarea name="enquiry" rows="4" required placeholder="Tell us what you need..."
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-400 focus:border-transparent outline-none resize-none"></textarea>
                </div>
                <button type="submit"
                        class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-green-500/30">
                    Submit Enquiry
                </button>
            </form>
        </div>
    </div>

</body>
</html>
