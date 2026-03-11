@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@push('styles')
    <style>
        #side-nav::-webkit-scrollbar {
            width: 6px;
        }

        #side-nav::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 3px;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush

@section('content')

    <!-- 1. Top Advert Strip (Dynamic from ShopPage) -->
    @if ($shopPage && $shopPage->top_alert_active)
        <div class="text-white text-xs md:text-sm py-2.5 text-center font-bold tracking-wider relative z-50"
            style="background-color: {{ $shopPage->top_alert_color ?? '#dc2626' }}">
            {{ $shopPage->top_alert_content }}
        </div>
    @else
        <div
            class="bg-gradient-to-r from-red-600 to-red-500 text-white text-xs md:text-sm py-2.5 text-center font-bold tracking-wider relative z-50">
            🚀 FLASH SALE: UP TO 50% OFF SELECTED PHONES! LIMITED TIME OFFER.
        </div>
    @endif

    <!-- 2. Custom Shop Header -->
    <header class="bg-white shadow-md sticky top-0 z-40">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between gap-4">

                <!-- Left: Logo & Menu -->
                <div class="flex items-center gap-2 md:gap-6">
                    <button id="shop-menu-toggle"
                        class="text-gray-700 hover:text-purple-600 focus:outline-none p-1 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                    </button>
                    <a href="/" class="flex items-center flex-shrink-0">
                        <img src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World"
                            class="h-8 md:h-10 object-contain">
                    </a>
                </div>

                <!-- Center: Search Bar -->
                <div class="flex-1 max-w-2xl hidden md:block mx-4">
                    <form action="{{ route('shop') }}" method="GET" class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search for products, brands and more..."
                            class="w-full bg-gray-100 border-2 border-transparent rounded-full py-2.5 px-6 pr-12 focus:bg-white focus:border-purple-500 focus:ring-0 transition-all duration-300">
                        <button type="submit"
                            class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 hover:shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Right: Account, Cart, Wishlist -->
                <div class="flex items-center gap-4 md:gap-8">
                    <div class="flex items-center gap-3 group cursor-pointer relative">
                        <div class="bg-gray-100 p-2 rounded-full group-hover:bg-purple-100 transition">
                            <svg class="w-6 h-6 text-gray-600 group-hover:text-purple-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="hidden lg:block text-sm leading-tight">
                            @auth
                                <span class="block font-bold text-gray-800">Hi, {{ auth()->user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-gray-500 hover:text-red-600">Sign Out</button>
                                </form>
                            @else
                                <span class="block font-bold text-gray-800">My Account</span>
                                <div class="flex gap-1 text-xs text-gray-500">
                                    <a href="{{ route('login') }}" class="hover:text-purple-600 hover:underline">Sign In</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('register') }}" class="hover:text-purple-600 hover:underline">Register</a>
                                </div>
                            @endauth
                        </div>
                    </div>

                    <a href="{{ route('wishlist.index') }}" class="relative group">
                        <div class="p-2 transition">
                            <svg class="w-7 h-7 text-gray-600 group-hover:text-red-500 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        @auth
                            <span
                                class="absolute top-0 right-0 bg-red-500 text-white text-[10px] font-bold h-5 w-5 flex items-center justify-center rounded-full border-2 border-white"
                                id="wishlist-count">{{ auth()->user()->wishlist->count() }}</span>
                        @endauth
                    </a>

                    <a href="{{ route('cart.index') }}" class="flex items-center gap-3 group">
                        <div class="relative p-2">
                            <svg class="w-7 h-7 text-gray-600 group-hover:text-purple-600 transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span
                                class="absolute top-0 right-0 bg-purple-600 text-white text-[10px] font-bold h-5 w-5 flex items-center justify-center rounded-full border-2 border-white">
                                {{ count(session('cart', [])) }}
                            </span>
                        </div>
                        <div class="hidden xl:block text-sm leading-tight">
                            <span class="block text-xs text-gray-500">Total</span>
                            <span class="block font-bold text-gray-800">KES
                                {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['quantity'])) }}</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Mobile Search -->
            <div class="md:hidden mt-4">
                <form action="{{ route('shop') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                        class="w-full bg-gray-100 border-none rounded-lg py-3 px-4 focus:ring-2 focus:ring-purple-500">
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-purple-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- 3. Side Nav (Off-canvas) -->
    <div id="side-nav-overlay"
        class="fixed inset-0 bg-black/50 z-[60] hidden transition-opacity duration-300 backdrop-blur-sm"></div>
    <div id="side-nav"
        class="fixed top-0 left-0 h-full w-80 bg-white shadow-2xl z-[70] transform -translate-x-full transition-transform duration-300 overflow-y-auto">
        <div class="p-5 flex justify-between items-center border-b border-gray-100 bg-gray-50">
            <h2 class="font-bold text-xl text-gray-800 flex items-center gap-2">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7">
                    </path>
                </svg>
                Menu
            </h2>
            <button id="side-nav-close"
                class="text-gray-400 hover:text-red-500 transition-colors p-1 bg-white rounded-full shadow-sm hover:shadow">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-8">
            <div>
                <h3 class="font-bold text-gray-400 uppercase text-xs tracking-wider mb-4 px-2">Navigation</h3>
                <ul class="space-y-1">
                    <li><a href="{{ route('about') }}"
                            class="flex items-center gap-3 p-3 hover:bg-purple-50 rounded-xl text-gray-700 font-medium transition-colors group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            About Us
                        </a></li>
                    <li><a href="#services"
                            class="flex items-center gap-3 p-3 hover:bg-purple-50 rounded-xl text-gray-700 font-medium transition-colors group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Services
                        </a></li>
                    <li><a href="{{ route('locations') }}"
                            class="flex items-center gap-3 p-3 hover:bg-purple-50 rounded-xl text-gray-700 font-medium transition-colors group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Locations
                        </a></li>
                    <li><a href="#contact"
                            class="flex items-center gap-3 p-3 hover:bg-purple-50 rounded-xl text-gray-700 font-medium transition-colors group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Contact
                        </a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-gray-400 uppercase text-xs tracking-wider mb-4 px-2">Phone Categories</h3>
                <ul class="space-y-1">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('shop', ['category' => $category->id]) }}"
                                class="flex items-center justify-between p-3 hover:bg-blue-50 rounded-xl text-gray-700 font-medium transition-colors group">
                                <span>{{ $category->name }}</span>
                                <svg class="w-4 h-4 text-gray-300 group-hover:text-blue-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- 4. Main Layout -->
    <div class="bg-gray-50 min-h-screen pb-20">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Left Sidebar -->
                <aside class="hidden lg:block w-1/4 space-y-8 sticky top-24 h-fit">
                    <!-- Categories Widget -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-lg mb-4 text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            All Categories
                        </h3>
                        <ul class="space-y-1 max-h-[400px] overflow-y-auto pr-2">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('shop', ['category' => $category->id]) }}"
                                        class="flex items-center justify-between text-gray-600 hover:text-purple-600 hover:bg-purple-50 p-3 rounded-xl transition duration-200 {{ request('category') == $category->id ? 'bg-purple-50 text-purple-600 font-semibold' : '' }}">
                                        <span>{{ $category->name }}</span>
                                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Range Widget -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-lg mb-4 text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Price Range
                        </h3>
                        <form action="{{ route('shop') }}" method="GET" class="space-y-4">
                            @foreach (request()->except(['min_price', 'max_price', 'page']) as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <div class="flex items-center gap-2">
                                <input type="number" name="min_price" value="{{ request('min_price') }}"
                                    placeholder="Min"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                                <span class="text-gray-400">-</span>
                                <input type="number" name="max_price" value="{{ request('max_price') }}"
                                    placeholder="Max"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <button type="submit"
                                class="w-full bg-purple-600 text-white text-sm font-bold py-2 rounded-lg hover:bg-purple-700 transition shadow-md hover:shadow-lg">Apply
                                Filter</button>
                        </form>
                    </div>

                    <!-- Brands Widget -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-lg mb-4 text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Top Brands
                        </h3>
                        <ul class="space-y-1 max-h-[300px] overflow-y-auto pr-2">
                            @foreach ($brands as $brand)
                                <li>
                                    <a href="{{ route('shop', ['brand' => $brand->id]) }}"
                                        class="flex items-center justify-between text-gray-600 hover:text-purple-600 hover:bg-purple-50 p-3 rounded-xl transition duration-200 {{ request('brand') == $brand->id ? 'bg-purple-50 text-purple-600 font-semibold' : '' }}">
                                        <span>{{ $brand->name }}</span>
                                        @if ($brand->products_count !== null)
                                            <span
                                                class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded-full">{{ $brand->products_count }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Sidebar Banner (Dynamic from ShopPage or fallback) -->
                    @if ($shopPage && $shopPage->sidebar_banner_title)
                        <div class="relative overflow-hidden rounded-2xl p-8 text-white text-center shadow-lg group cursor-pointer transform hover:scale-[1.02] transition-all duration-300"
                            style="{{ $shopPage->sidebar_banner_image ? 'background-image: url(' . $shopPage->sidebar_banner_image . '); background-size: cover; background-position: center;' : 'background: linear-gradient(135deg, #7c3aed, #2563eb);' }}">
                            <div class="absolute inset-0 bg-black/30 rounded-2xl"></div>
                            <div class="relative z-10">
                                @if ($shopPage->sidebar_banner_discount)
                                    <span
                                        class="inline-block bg-white/20 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full mb-4">{{ $shopPage->sidebar_banner_discount }}</span>
                                @endif
                                <h4 class="font-extrabold text-3xl mb-2">{{ $shopPage->sidebar_banner_title }}</h4>
                                @if ($shopPage->sidebar_banner_description)
                                    <p class="text-sm opacity-90 mb-6 font-medium">
                                        {{ $shopPage->sidebar_banner_description }}</p>
                                @endif
                                @if ($shopPage->sidebar_banner_code)
                                    <div
                                        class="bg-white text-purple-600 px-6 py-3 rounded-full font-bold text-sm shadow-lg flex items-center justify-center gap-2">
                                        <span>Use Code:</span>
                                        <span
                                            class="font-mono border-dashed border-b-2 border-purple-400">{{ $shopPage->sidebar_banner_code }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <div
                            class="relative overflow-hidden bg-gradient-to-br from-purple-600 to-blue-600 rounded-2xl p-8 text-white text-center shadow-lg group cursor-pointer transform hover:scale-[1.02] transition-all duration-300">
                            <div
                                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700">
                            </div>
                            <div class="relative z-10">
                                <span
                                    class="inline-block bg-white/20 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full mb-4">NEW
                                    USER OFFER</span>
                                <h4 class="font-extrabold text-4xl mb-2">-5% OFF</h4>
                                <p class="text-sm opacity-90 mb-6 font-medium">On your first purchase!</p>
                                <div
                                    class="bg-white text-purple-600 px-6 py-3 rounded-full font-bold text-sm shadow-lg flex items-center justify-center gap-2">
                                    <span>Use Code:</span>
                                    <span class="font-mono border-dashed border-b-2 border-purple-400">WELCOME5</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </aside>

                <!-- Main Content -->
                <div class="w-full lg:w-3/4 space-y-12">

                    <!-- Featured Products Carousel -->
                    <section>
                        <div class="flex justify-between items-end mb-6">
                            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                                <span class="text-purple-600">★</span> Featured Products
                            </h2>
                            <a href="{{ route('shop', ['featured' => 1]) }}"
                                class="text-purple-600 hover:text-purple-800 text-sm font-semibold flex items-center gap-1">
                                View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        @if ($featuredProducts->isEmpty())
                            <div class="bg-white p-8 rounded-2xl text-center text-gray-500">No featured products found.
                            </div>
                        @else
                            <div class="relative group/carousel">
                                <div class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory scroll-smooth hide-scrollbar"
                                    id="featured-carousel">
                                    @foreach ($featuredProducts as $product)
                                        <div
                                            class="min-w-[280px] md:min-w-[300px] snap-center bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden group flex flex-col">
                                            <div class="relative h-48 bg-gray-50 p-6 flex items-center justify-center">
                                                @if ($product->image)
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                        class="max-w-full max-h-full object-contain group-hover:scale-110 transition duration-500">
                                                @else
                                                    <span class="text-gray-400 text-sm">No Image</span>
                                                @endif
                                                @if ($product->discount_price)
                                                    <span
                                                        class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-md">SALE</span>
                                                @endif
                                                <button onclick="toggleWishlist({{ $product->id }})"
                                                    class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:shadow-md transition transform hover:scale-110">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-5 flex-1 flex flex-col">
                                                <div class="mb-2">
                                                    <span
                                                        class="text-[10px] uppercase font-bold text-gray-400 tracking-wider">{{ $product->category->name ?? 'Product' }}</span>
                                                    <h3
                                                        class="font-bold text-gray-800 text-sm leading-snug line-clamp-2 min-h-[2.5rem]">
                                                        {{ $product->name }}</h3>
                                                </div>
                                                <div class="mt-auto">
                                                    <div class="flex items-center gap-2 mb-4">
                                                        <span class="font-extrabold text-lg text-purple-600">KES
                                                            {{ number_format($product->price) }}</span>
                                                        @if ($product->discount_price)
                                                            <span class="text-xs text-gray-400 line-through">KES
                                                                {{ number_format($product->discount_price) }}</span>
                                                        @endif
                                                    </div>
                                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full bg-gray-900 text-white py-2.5 rounded-xl text-sm font-bold hover:bg-purple-600 shadow-lg hover:shadow-purple-500/30 transition-all duration-300 flex items-center justify-center gap-2">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                                </path>
                                                            </svg>
                                                            Add to Cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button
                                    onclick="document.getElementById('featured-carousel').scrollBy({left: -300, behavior: 'smooth'})"
                                    class="absolute left-0 top-1/2 -translate-y-1/2 -ml-4 bg-white p-2 rounded-full shadow-lg text-gray-800 hover:text-purple-600 z-10 opacity-0 group-hover/carousel:opacity-100 transition-opacity hidden md:block">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <button
                                    onclick="document.getElementById('featured-carousel').scrollBy({left: 300, behavior: 'smooth'})"
                                    class="absolute right-0 top-1/2 -translate-y-1/2 -mr-4 bg-white p-2 rounded-full shadow-lg text-gray-800 hover:text-purple-600 z-10 opacity-0 group-hover/carousel:opacity-100 transition-opacity hidden md:block">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </section>

                    <!-- Flash Sales (NEW — dynamic from Strapi) -->
                    @if ($flashSales->isNotEmpty())
                        <section
                            class="bg-gradient-to-r from-red-600 to-orange-500 rounded-3xl p-8 text-white overflow-hidden relative">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16">
                            </div>
                            <div class="relative z-10">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-2xl font-bold flex items-center gap-2">⚡ Flash Sales</h2>
                                    <span
                                        class="bg-white/20 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full">Limited
                                        Stock!</span>
                                </div>
                                <div class="flex overflow-x-auto gap-4 pb-2 hide-scrollbar">
                                    @foreach ($flashSales as $product)
                                        <div
                                            class="min-w-[220px] bg-white/10 backdrop-blur-sm rounded-2xl p-4 flex-shrink-0 hover:bg-white/20 transition group">
                                            <div class="h-32 flex items-center justify-center mb-3">
                                                @if ($product->image)
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                        class="max-h-full object-contain group-hover:scale-110 transition duration-300">
                                                @else
                                                    <span class="text-white/50 text-sm">No Image</span>
                                                @endif
                                            </div>
                                            <h3 class="font-bold text-sm line-clamp-2 mb-2">{{ $product->name }}</h3>
                                            <div class="flex items-center justify-between">
                                                <span class="font-extrabold text-lg">KES
                                                    {{ number_format($product->price) }}</span>
                                                @if ($product->discount_price)
                                                    <span class="text-xs line-through opacity-70">KES
                                                        {{ number_format($product->discount_price) }}</span>
                                                @endif
                                            </div>
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                                class="mt-3">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full bg-white text-red-600 font-bold text-xs py-2 rounded-lg hover:bg-yellow-400 hover:text-black transition">
                                                    Add to Cart
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    <!-- Latest Deals -->
                    <section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 overflow-hidden relative">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-red-50 rounded-full blur-3xl -mr-16 -mt-16 z-0">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="flex flex-col md:flex-row justify-between items-center mb-8 gap-6 border-b border-gray-100 pb-6">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">🔥 Latest Deals</h2>
                                    <p class="text-gray-500 text-sm mt-1">Grab these limited-time offers before they
                                        expire!</p>
                                </div>
                                @php
                                    $nextDealEnd = $deals->min('deal_end_time') ?? now()->addDays(2)->toISOString();
                                @endphp
                                <div class="flex gap-3 text-center" id="deals-countdown" data-end="{{ $nextDealEnd }}">
                                    <div class="bg-gray-900 text-white rounded-xl p-3 min-w-[70px] shadow-lg">
                                        <span class="block text-2xl font-bold font-mono" id="days">00</span>
                                        <span class="text-[10px] uppercase tracking-wider text-gray-400">Days</span>
                                    </div>
                                    <div class="bg-gray-900 text-white rounded-xl p-3 min-w-[70px] shadow-lg">
                                        <span class="block text-2xl font-bold font-mono" id="hours">00</span>
                                        <span class="text-[10px] uppercase tracking-wider text-gray-400">Hours</span>
                                    </div>
                                    <div class="bg-gray-900 text-white rounded-xl p-3 min-w-[70px] shadow-lg">
                                        <span class="block text-2xl font-bold font-mono" id="minutes">00</span>
                                        <span class="text-[10px] uppercase tracking-wider text-gray-400">Mins</span>
                                    </div>
                                    <div class="bg-gray-900 text-white rounded-xl p-3 min-w-[70px] shadow-lg">
                                        <span class="block text-2xl font-bold font-mono" id="seconds">00</span>
                                        <span class="text-[10px] uppercase tracking-wider text-gray-400">Secs</span>
                                    </div>
                                </div>
                            </div>

                            @if ($deals->isEmpty())
                                <div class="text-center text-gray-500 py-10">Check back later for new deals!</div>
                            @else
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach ($deals as $deal)
                                        <div
                                            class="flex gap-5 items-center bg-white p-5 rounded-2xl border border-gray-100 hover:border-purple-200 hover:shadow-lg transition-all duration-300 group">
                                            <div
                                                class="w-32 h-32 bg-gray-50 rounded-xl p-3 flex-shrink-0 flex items-center justify-center">
                                                @if ($deal->image)
                                                    <img src="{{ $deal->image }}" alt="{{ $deal->name }}"
                                                        class="max-w-full max-h-full object-contain group-hover:scale-110 transition duration-300">
                                                @else
                                                    <span class="text-xs text-gray-400">No Image</span>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h3 class="font-bold text-gray-800 text-lg mb-1 truncate">
                                                    {{ $deal->name }}</h3>
                                                <p class="text-xs text-gray-500 mb-3 line-clamp-2">
                                                    {{ is_array($deal->description) ? collect($deal->description)->pluck('children')->flatten(1)->pluck('text')->implode(' ') : $deal->description }}
                                                </p>
                                                <span class="text-xl font-bold text-red-600">KES
                                                    {{ number_format($deal->price) }}</span>
                                                @if ($deal->discount_price)
                                                    <span class="text-sm text-gray-400 line-through">KES
                                                        {{ number_format($deal->discount_price) }}</span>
                                                @endif
                                            </div>
                                            <div class="flex items-center justify-between gap-4">
                                                <div class="w-full bg-gray-100 rounded-full h-2">
                                                    @php
                                                        $stockPct =
                                                            $deal->stock > 0 ? min(100, ($deal->stock / 20) * 100) : 10;
                                                    @endphp
                                                    <div class="bg-gradient-to-r from-red-500 to-orange-500 h-2 rounded-full"
                                                        style="width: {{ $stockPct }}%"></div>
                                                </div>
                                                <span
                                                    class="text-xs font-bold text-red-500 whitespace-nowrap">{{ $deal->stock }}
                                                    left</span>
                                            </div>
                                        </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                </div>
                </section>

                <!-- All Products Grid -->
                <section>
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-bold text-gray-800">
                            Explore All Products
                            @if (request('search'))
                                <span class="text-base font-normal text-gray-500 ml-2">for
                                    "{{ request('search') }}"</span>
                            @endif
                        </h2>
                        <div class="relative">
                            <form method="GET" action="{{ route('shop') }}" id="sortForm"
                                class="flex items-center gap-2">
                                @foreach (request()->except(['sort', 'page']) as $key => $value)
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endforeach
                                <label for="sort" class="text-sm font-medium text-gray-600">Sort by:</label>
                                <select name="sort" id="sort"
                                    onchange="document.getElementById('sortForm').submit()"
                                    class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block p-2">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest
                                    </option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                        Price: Low to High</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                        Price: High to Low
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>

                    @if ($products->isEmpty())
                        <div class="bg-white rounded-2xl p-16 text-center">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <p class="text-gray-500 font-medium text-lg">No products found.</p>
                            <a href="{{ route('shop') }}"
                                class="mt-4 inline-block text-purple-600 hover:underline text-sm">Clear all filters</a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($products as $product)
                                <div
                                    class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col">
                                    <div
                                        class="relative h-56 bg-gray-50 p-8 flex items-center justify-center overflow-hidden">
                                        <div
                                            class="absolute inset-0 bg-white/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                        </div>
                                        @if ($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                class="max-w-full max-h-full object-contain transform group-hover:scale-110 transition duration-500 relative z-0">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                        <div
                                            class="absolute bottom-4 left-0 right-0 flex justify-center gap-4 translate-y-10 group-hover:translate-y-0 transition-transform duration-300 z-20">
                                            <button onclick="toggleWishlist({{ $product->id }})"
                                                class="bg-white text-gray-600 hover:text-red-500 p-3 rounded-full shadow-lg hover:shadow-xl transition transform hover:scale-110"
                                                title="Add to Wishlist">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <a href="{{ route('product.show', $product->slug) }}"
                                                class="bg-white text-gray-600 hover:text-purple-600 p-3 rounded-full shadow-lg hover:shadow-xl transition transform hover:scale-110"
                                                title="View Details">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-6 flex-1 flex flex-col">
                                        <div class="mb-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <span
                                                    class="text-[10px] uppercase font-bold text-purple-600 bg-purple-50 px-2 py-1 rounded-md">{{ $product->category->name ?? 'Device' }}</span>
                                                @if ($product->stock !== null && $product->stock < 5)
                                                    <span class="text-[10px] font-bold text-red-500">Low Stock</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('product.show', $product->slug) }}"
                                                class="block group-hover:text-purple-600 transition-colors">
                                                <h3
                                                    class="font-bold text-gray-900 text-lg leading-snug line-clamp-2 min-h-[3.5rem]">
                                                    {{ $product->name }}</h3>
                                            </a>
                                        </div>
                                        <div class="mt-auto pt-4 border-t border-gray-100">
                                            <div class="flex items-center justify-between mb-4">
                                                <div>
                                                    <span class="block text-xs text-gray-400">Price</span>
                                                    <span class="font-extrabold text-xl text-gray-900">KES
                                                        {{ number_format($product->price) }}</span>
                                                </div>
                                                @if ($product->discount_price)
                                                    <div class="text-right">
                                                        <span class="block text-xs text-gray-400 line-through">KES
                                                            {{ number_format($product->discount_price) }}</span>
                                                        @php
                                                            $discountPct =
                                                                $product->price > 0
                                                                    ? round(
                                                                        (($product->discount_price - $product->price) /
                                                                            $product->discount_price) *
                                                                            100,
                                                                    )
                                                                    : 0;
                                                        @endphp
                                                        <span
                                                            class="text-xs font-bold text-red-500">-{{ $discountPct }}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full bg-gray-900 text-white py-3 rounded-xl text-sm font-bold hover:bg-purple-600 shadow-lg hover:shadow-purple-500/30 transition-all duration-300 flex items-center justify-center gap-2">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                    </svg>
                                                    Add to Cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-12">
                            {{ $products->links() }}
                        </div>
                    @endif
                </section>

                <!-- Bottom Banner -->
                <section class="mt-20 relative rounded-3xl overflow-hidden bg-gray-900 text-white shadow-2xl">
                    <div
                        class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-900 to-transparent"></div>
                    <div class="relative z-10 p-12 md:p-20 flex flex-col md:flex-row items-center justify-between gap-10">
                        <div class="max-w-xl space-y-6">
                            <span
                                class="inline-block bg-yellow-400 text-black font-bold text-xs px-3 py-1 rounded-full tracking-wider mb-2">LIMITED
                                TIME OFFER</span>
                            <h2 class="text-4xl md:text-5xl font-black leading-tight">
                                Get <span class="text-yellow-400">5% OFF</span> Your First Order!
                            </h2>
                            <p class="text-gray-300 text-lg">Join the Safe World family today and experience premium
                                connectivity. Use the code below at checkout.</p>
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <div
                                    class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl px-6 py-4 flex items-center gap-4">
                                    <span class="text-gray-400 text-sm uppercase font-bold tracking-wider">Code:</span>
                                    <span
                                        class="font-mono text-2xl font-bold text-yellow-400 tracking-widest">WELCOME5</span>
                                </div>
                                <button
                                    onclick="navigator.clipboard.writeText('WELCOME5'); showToast('Code copied to clipboard!')"
                                    class="bg-white text-purple-900 hover:bg-yellow-400 hover:text-black px-8 py-4 rounded-xl font-bold transition-all duration-300 shadow-lg flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                        </path>
                                    </svg>
                                    Copy Code
                                </button>
                            </div>
                        </div>
                        <div class="hidden md:block relative">
                            <div
                                class="w-64 h-64 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full blur-3xl opacity-30 animate-pulse">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Trusted Brands (Dynamic from Strapi) -->
                <section class="py-16 border-t border-gray-200 mt-20">
                    <h3 class="text-center text-gray-400 text-xs font-bold uppercase tracking-[0.2em] mb-10">Trusted By
                        Leading Brands</h3>
                    <div
                        class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-40 hover:opacity-100 grayscale hover:grayscale-0 transition duration-700">
                        @forelse($brands as $brand)
                            <a href="{{ route('shop', ['brand' => $brand->id]) }}"
                                class="text-2xl font-black text-gray-800 hover:text-purple-600 transition uppercase">
                                {{ $brand->name }}
                            </a>
                        @empty
                            <div class="text-2xl font-black text-gray-800 hover:text-blue-600 transition">SAMSUNG</div>
                            <div class="text-2xl font-black text-gray-800 hover:text-black transition">APPLE</div>
                            <div class="text-2xl font-black text-gray-800 hover:text-blue-800 transition">NOKIA</div>
                        @endforelse
                    </div>
                </section>

            </div>
        </div>
    </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Side Nav Toggle
            const menuToggle = document.getElementById('shop-menu-toggle');
            const sideNav = document.getElementById('side-nav');
            const overlay = document.getElementById('side-nav-overlay');
            const closeBtn = document.getElementById('side-nav-close');

            function toggleMenu() {
                if (sideNav && overlay) {
                    sideNav.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                    document.body.classList.toggle('overflow-hidden');
                }
            }

            menuToggle?.addEventListener('click', toggleMenu);
            closeBtn?.addEventListener('click', toggleMenu);
            overlay?.addEventListener('click', toggleMenu);

            // Deals Countdown Timer
            const countdownEl = document.getElementById('deals-countdown');
            if (countdownEl) {
                const endTimeStr = countdownEl.dataset.end;
                if (endTimeStr) {
                    const endTime = new Date(endTimeStr).getTime();

                    const updateTimer = () => {
                        const distance = endTime - new Date().getTime();

                        if (distance < 0) {
                            clearInterval(timerInterval);
                            countdownEl.innerHTML =
                                '<div class="bg-red-500 text-white px-4 py-2 rounded-lg font-bold">EXPIRED</div>';
                            return;
                        }

                        const pad = n => String(Math.floor(n)).padStart(2, '0');

                        document.getElementById('days').textContent = pad(distance / (1000 * 60 * 60 * 24));
                        document.getElementById('hours').textContent = pad((distance % (1000 * 60 * 60 * 24)) /
                            (1000 * 60 * 60));
                        document.getElementById('minutes').textContent = pad((distance % (1000 * 60 * 60)) / (
                            1000 * 60));
                        document.getElementById('seconds').textContent = pad((distance % (1000 * 60)) / 1000);
                    };

                    const timerInterval = setInterval(updateTimer, 1000);
                    updateTimer();
                }
            }
        });

        function toggleWishlist(productId) {
            fetch(`/wishlist/toggle/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (response.status === 401) {
                        window.location.href = '{{ route('login') }}';
                        return null;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data) {
                        document.querySelectorAll('#wishlist-count').forEach(el => el.textContent = data.count);
                        showToast(data.message, data.added ? 'success' : 'info');
                    }
                })
                .catch(console.error);
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className =
                `fixed bottom-5 right-5 px-6 py-3 rounded-lg shadow-2xl text-white transform transition-all duration-300 translate-y-20 z-50 ${type === 'success' ? 'bg-green-600' : 'bg-gray-800'}`;
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => toast.classList.remove('translate-y-20'), 10);
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
@endpush
