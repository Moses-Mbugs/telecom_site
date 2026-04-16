@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
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

    <!-- Top Alert (Dynamic) -->
    @if ($shopPage && $shopPage->top_alert_active)
        <div
            class="bg-[#b5342a] text-white text-xs md:text-sm py-2 text-center font-bold tracking-wide relative z-50 shadow-md">
            {{ $shopPage->top_alert_content }}
        </div>
    @endif

    <!-- Mobile Header -->
    <header class="lg:hidden bg-white shadow-sm sticky top-0 z-40" x-data>
        <div class="px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World" class="h-8 w-auto">
            </a>
            <div class="flex items-center gap-4">
                <button @click="$dispatch('open-cart')" class="relative text-gray-600 hover:text-accent transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span
                        class="absolute -top-1 -right-1 bg-accent text-white text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full">{{ count(session('cart', [])) }}</span>
                </button>
                <button @click="$dispatch('open-mobile-menu')" class="text-gray-600 hover:text-accent transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Search Bar -->
        <div class="px-4 pb-3">
            <form action="{{ route('shop') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search products..."
                    class="w-full bg-gray-50 border border-gray-200 rounded-full py-2 px-5 pl-10 focus:bg-white focus:border-accent focus:ring-2 focus:ring-red-100 transition-all outline-none text-sm text-gray-700 placeholder-gray-400">
                <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>
    </header>

    <!-- Desktop Header -->
    <header
        class="hidden lg:block bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm/50 backdrop-blur-md bg-white/90">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between gap-8">
                <!-- Logo -->
                <a href="/" class="flex-shrink-0">
                    <img src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World"
                        class="h-10 w-auto">
                </a>

                <!-- Search -->
                <div class="flex-1 max-w-2xl">
                    <form action="{{ route('shop') }}" method="GET" class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search for products, brands, and categories..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-full py-2.5 px-6 pl-12 focus:bg-white focus:border-accent focus:ring-2 focus:ring-red-100 transition-all duration-300 outline-none text-sm text-gray-700 placeholder-gray-400">
                        <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2 group-focus-within:text-accent transition-colors"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2 group cursor-pointer relative">
                        <div
                            class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-500 group-hover:bg-red-50 group-hover:text-accent transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="text-sm">
                            @auth
                                <p class="text-xs text-gray-500">Welcome back,</p>
                                <p class="font-bold text-gray-800">{{ auth()->user()->name }}</p>
                            @else
                                <p class="text-xs text-gray-500">Account</p>
                                <a href="{{ route('login') }}"
                                    class="font-bold text-gray-800 hover:text-accent transition">Sign In</a>
                            @endauth
                        </div>
                    </div>

                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}"
                        class="flex items-center gap-3 group bg-gray-50 hover:bg-red-50 px-4 py-2 rounded-full transition-colors">
                        <div class="relative">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-accent transition-colors" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <span
                                class="absolute -top-1.5 -right-1.5 bg-accent text-white text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full ring-2 ring-white">{{ count(session('cart', [])) }}</span>
                        </div>
                        <span class="font-bold text-gray-800 text-sm group-hover:text-primary transition">KES
                            {{ number_format(collect(session('cart', []))->sum(fn($i) => $i['price'] * $i['quantity'])) }}</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-gray-50 min-h-screen py-4 sm:py-8" x-data="{ mobileFiltersOpen: false }" @open-mobile-menu.window="mobileFiltersOpen = true" @keydown.escape.window="mobileFiltersOpen = false">
        <div class="container mx-auto px-3 sm:px-4 lg:px-6">

            <!-- Breadcrumbs -->
            <nav class="flex mb-4 sm:mb-8 text-sm text-gray-500">
                <a href="/" class="hover:text-accent transition-colors">Home</a>
                <span class="mx-2">/</span>
                <span class="text-gray-800 font-medium">Shop</span>
            </nav>

            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Sidebar Filters (Desktop) -->
                <aside class="hidden lg:block w-64 flex-shrink-0 space-y-8">
                    <!-- Categories -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <span class="w-1 h-6 bg-accent rounded-full"></span>
                            Categories
                        </h3>
                        <ul class="space-y-2 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                            @foreach ($categories as $category)
                                @if (isset($category->name) && isset($category->id))
                                    <li>
                                        <a href="{{ route('shop', array_merge(request()->except('category', 'page'), ['category' => $category->id])) }}"
                                            class="flex items-center justify-between text-sm py-1.5 px-2 rounded-lg transition-colors {{ request('category') == $category->id ? 'bg-red-50 text-primary font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                            <span>{{ $category->name }}</span>
                                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Filter -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <span class="w-1 h-6 bg-accent rounded-full"></span>
                            Price Range
                        </h3>
                        <form action="{{ route('shop') }}" method="GET" class="space-y-4">
                            @foreach (request()->except(['min_price', 'max_price', 'page']) as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="text-xs text-gray-500 mb-1 block">Min</label>
                                    <input type="number" name="min_price" value="{{ request('min_price') }}"
                                        placeholder="0"
                                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-accent focus:border-transparent outline-none transition">
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500 mb-1 block">Max</label>
                                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                                        placeholder="Max"
                                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-accent focus:border-transparent outline-none transition">
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full bg-gray-900 text-white text-sm font-bold py-2.5 rounded-lg hover:bg-accent transition-colors shadow-lg shadow-gray-200">Apply
                                Filter</button>
                        </form>
                    </div>

                    <!-- Brands -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <span class="w-1 h-6 bg-accent rounded-full"></span>
                            Brands
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($brands as $brand)
                                @if (isset($brand->name) && isset($brand->id))
                                    <a href="{{ route('shop', array_merge(request()->except('brand', 'page'), ['brand' => $brand->id])) }}"
                                        class="text-xs font-medium px-3 py-1.5 rounded-full border transition-all {{ request('brand') == $brand->id ? 'bg-accent text-white border-accent shadow-md' : 'bg-white text-gray-600 border-gray-200 hover:border-accent hover:text-accent' }}">
                                        {{ $brand->name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Promo Banner -->
                    @if ($shopPage && $shopPage->sidebar_banner_title)
                        <div class="relative rounded-2xl overflow-hidden shadow-lg group">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                                style="background-image: url('{{ $shopPage->sidebar_banner_image ?? 'https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}');">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            <div class="relative p-6 text-white h-full flex flex-col justify-end items-start">
                                @if ($shopPage->sidebar_banner_discount)
                                    <span
                                        class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-sm mb-2 uppercase tracking-wider">Sale</span>
                                @endif
                                <h4 class="font-bold text-xl leading-tight mb-2">{{ $shopPage->sidebar_banner_title }}
                                </h4>
                                <p class="text-sm text-gray-300 mb-4 line-clamp-2">
                                    {{ $shopPage->sidebar_banner_description }}</p>
                                @if ($shopPage->sidebar_banner_code)
                                    <div
                                        class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg px-3 py-2 flex items-center gap-2 text-xs w-full">
                                        <span class="text-gray-300">Code:</span>
                                        <span
                                            class="font-mono font-bold text-yellow-400 select-all">{{ $shopPage->sidebar_banner_code }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </aside>

                <!-- Main Content -->
                <main class="flex-1 min-w-0">

                    <!-- Flash Sales Section -->
                    @if ($flashSales->isNotEmpty())
                        <div
                            class="mb-10 bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-6 md:p-8 text-white relative overflow-hidden shadow-xl">
                            <div
                                class="absolute top-0 right-0 w-96 h-96 bg-accent rounded-full blur-[100px] opacity-30 -mr-20 -mt-20 pointer-events-none">
                            </div>

                            <div
                                class="flex flex-col md:flex-row items-start md:items-end justify-between mb-8 relative z-10 gap-4">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="animate-pulse w-2 h-2 bg-red-500 rounded-full"></span>
                                        <span class="text-red-400 font-bold text-xs uppercase tracking-wider">Live
                                            Now</span>
                                    </div>
                                    <h2 class="text-3xl font-black italic tracking-tight">FLASH <span
                                            class="text-yellow-400">SALES</span></h2>
                                    <p class="text-gray-400 text-sm mt-1">Limited time offers. Don't miss out!</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 relative z-10">
                                @foreach ($flashSales as $product)
                                    <div
                                        class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/20 transition-all duration-300 group">
                                        <div
                                            class="relative aspect-square mb-4 bg-white/5 rounded-lg flex items-center justify-center overflow-hidden">
                                            @if ($product->image)
                                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                                    class="object-contain w-full h-full p-2 group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <span class="text-xs text-gray-400">No Image</span>
                                            @endif
                                            @if ($product->discount_price)
                                                <div
                                                    class="absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded shadow-sm">
                                                    -{{ round((($product->discount_price - $product->price) / $product->discount_price) * 100) }}%
                                                </div>
                                            @endif
                                        </div>
                                        <h3
                                            class="font-medium text-sm text-gray-100 line-clamp-1 mb-1 group-hover:text-yellow-400 transition-colors">
                                            <a
                                                href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="flex items-baseline gap-2">
                                            <span class="font-bold text-white">KES
                                                {{ number_format($product->price) }}</span>
                                            @if ($product->discount_price)
                                                <span class="text-xs text-gray-400 line-through">KES
                                                    {{ number_format($product->discount_price) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Promo Banner -->
                    @if (isset($shopPage) && $shopPage->promo_banner_image)
                        <div class="mb-10">
                            @if ($shopPage->promo_banner_link)
                                <a href="{{ $shopPage->promo_banner_link }}" target="_blank" rel="noopener">
                                    <img src="{{ $shopPage->promo_banner_image }}" alt="Promotion"
                                        class="w-full rounded-2xl shadow-lg object-cover max-h-48">
                                </a>
                            @else
                                <img src="{{ $shopPage->promo_banner_image }}" alt="Promotion"
                                    class="w-full rounded-2xl shadow-lg object-cover max-h-48">
                            @endif
                        </div>
                    @endif

                    <!-- Featured Products Carousel -->
                    @if ($featuredProducts->isNotEmpty())
                        <div class="mb-10">
                            <div class="flex justify-between items-end mb-6">
                                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                    <span class="text-accent">✦</span> Featured Products
                                </h2>
                                <a href="{{ route('shop', ['featured' => 1]) }}"
                                    class="text-accent text-sm font-bold hover:underline">View All</a>
                            </div>

                            <div class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory hide-scrollbar">
                                @foreach ($featuredProducts as $product)
                                    <div
                                        class="min-w-[160px] sm:min-w-[200px] md:min-w-[240px] snap-center bg-[#1e3040] rounded-2xl p-3 sm:p-4 shadow-md border border-white/10 hover:shadow-xl hover:border-accent/40 transition-all duration-300 group">
                                        <div
                                            class="relative h-40 bg-white/10 rounded-xl mb-3 flex items-center justify-center overflow-hidden">
                                            @if ($product->image)
                                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                                    class="max-w-[90%] max-h-[90%] object-contain group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <span class="text-white/40 text-xs">No Image</span>
                                            @endif
                                            @if ($product->discount_price)
                                                <span
                                                    class="absolute top-2 left-2 bg-accent text-white text-[10px] font-bold px-2 py-1 rounded-full">Sale</span>
                                            @endif
                                        </div>
                                        <h3
                                            class="font-bold text-white text-sm leading-snug line-clamp-1 mb-1 group-hover:text-accent transition-colors">
                                            <a
                                                href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="flex items-center gap-2">
                                            <span class="font-bold text-white">KES
                                                {{ number_format($product->price) }}</span>
                                            @if ($product->discount_price)
                                                <span class="text-xs text-white/50 line-through">KES
                                                    {{ number_format($product->discount_price) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Latest Deals with Countdown -->
                    @if ($deals->isNotEmpty())
                        @php
                            $nextDealEnd = $deals->min('deal_end_time') ?? now()->addDays(2)->toISOString();
                        @endphp
                        <div class="mb-10 bg-white rounded-2xl border border-gray-100 p-6 md:p-8 shadow-sm relative overflow-hidden"
                            x-data="countdown('{{ $nextDealEnd }}')">
                            <div
                                class="absolute top-0 right-0 w-64 h-64 bg-red-50 rounded-full blur-3xl -mr-16 -mt-16 z-0">
                            </div>

                            <div class="relative z-10">
                                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-6">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                                            🔥 Latest Deals
                                        </h2>
                                        <p class="text-gray-500 text-sm mt-1">Grab these limited-time offers before they
                                            expire!</p>
                                    </div>

                                    <!-- Countdown -->
                                    <div class="flex gap-2 text-center">
                                        <div class="bg-gray-900 text-white rounded-lg p-2 min-w-[50px]">
                                            <span class="block text-lg font-bold font-mono leading-none"
                                                x-text="days">00</span>
                                            <span class="text-[10px] text-gray-400 uppercase">Days</span>
                                        </div>
                                        <div class="bg-gray-900 text-white rounded-lg p-2 min-w-[50px]">
                                            <span class="block text-lg font-bold font-mono leading-none"
                                                x-text="hours">00</span>
                                            <span class="text-[10px] text-gray-400 uppercase">Hrs</span>
                                        </div>
                                        <div class="bg-gray-900 text-white rounded-lg p-2 min-w-[50px]">
                                            <span class="block text-lg font-bold font-mono leading-none"
                                                x-text="minutes">00</span>
                                            <span class="text-[10px] text-gray-400 uppercase">Min</span>
                                        </div>
                                        <div class="bg-gray-900 text-white rounded-lg p-2 min-w-[50px]">
                                            <span class="block text-lg font-bold font-mono leading-none"
                                                x-text="seconds">00</span>
                                            <span class="text-[10px] text-gray-400 uppercase">Sec</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach ($deals as $deal)
                                        <div
                                            class="flex gap-4 items-center bg-gray-50 p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-gray-100 group">
                                            <div
                                                class="w-20 h-20 bg-white rounded-lg p-2 flex-shrink-0 flex items-center justify-center shadow-sm">
                                                @if ($deal->image)
                                                    <img src="{{ $deal->image_url }}" alt="{{ $deal->name }}"
                                                        class="max-w-full max-h-full object-contain group-hover:scale-110 transition duration-300">
                                                @else
                                                    <span class="text-[10px] text-gray-400">No Image</span>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h3 class="font-bold text-gray-900 text-sm mb-1 truncate">
                                                    <a
                                                        href="{{ route('product.show', $deal->slug) }}">{{ $deal->name }}</a>
                                                </h3>
                                                <div class="flex items-baseline gap-2 mb-2">
                                                    <span class="font-bold text-red-600">KES
                                                        {{ number_format($deal->price) }}</span>
                                                    @if ($deal->discount_price)
                                                        <span class="text-xs text-gray-400 line-through">KES
                                                            {{ number_format($deal->discount_price) }}</span>
                                                    @endif
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                        <div class="h-full bg-red-500 rounded-full"
                                                            style="width: {{ $deal->stock > 0 ? min(100, ($deal->stock / 20) * 100) : 0 }}%">
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-[10px] font-bold text-red-500 whitespace-nowrap">{{ $deal->stock }}
                                                        left</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Shop Video Section -->
                    @if (!empty($shopVideo))
                        <div class="mb-10 rounded-2xl overflow-hidden shadow-lg relative group">
                            <video src="{{ Str::startsWith($shopVideo, 'http') ? $shopVideo : asset('storage/' . $shopVideo) }}"
                                class="w-full h-auto max-h-[500px] object-cover"
                                autoplay loop muted playsinline>
                            </video>
                            @if(!empty($shopVideoTitle) || !empty($shopVideoText))
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8 md:p-12">
                                    @if(!empty($shopVideoTitle))
                                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">{{ $shopVideoTitle }}</h2>
                                    @endif
                                    @if(!empty($shopVideoText))
                                        <p class="text-gray-200 text-sm md:text-base max-w-2xl">{{ $shopVideoText }}</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Sort & Filter Bar (Mobile Toggle + Sort) -->
                    <div
                        class="flex items-center justify-between mb-6 lg:static z-30 bg-gray-50/95 backdrop-blur-sm py-2 lg:py-0">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 hidden lg:block">All Products <span
                                    class="text-sm font-normal text-gray-500 ml-2">({{ $products->total() }} items)</span>
                            </h2>
                            <span class="lg:hidden text-xs text-gray-500 font-medium">{{ $products->total() }} items</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <button @click="mobileFiltersOpen = true"
                                class="lg:hidden flex items-center gap-2 bg-white border border-gray-200 px-4 py-2 rounded-lg text-sm font-bold text-gray-700 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                    </path>
                                </svg>
                                Filters
                            </button>

                            <form method="GET" action="{{ route('shop') }}" id="sortForm"
                                class="flex items-center gap-2">
                                @foreach (request()->except(['sort', 'page']) as $key => $value)
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endforeach
                                <select name="sort" onchange="document.getElementById('sortForm').submit()"
                                    class="bg-white border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-accent focus:border-accent p-2.5 shadow-sm outline-none cursor-pointer">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest Arrivals
                                    </option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price:
                                        Low to High</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price:
                                        High to Low</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    @if ($products->isEmpty())
                        <div class="bg-white rounded-3xl p-12 text-center border border-dashed border-gray-200">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">No products found</h3>
                            <p class="text-gray-500 mb-6 max-w-sm mx-auto">We couldn't find any products matching your
                                current filters. Try adjusting your search or filter criteria.</p>
                            <a href="{{ route('shop') }}"
                                class="inline-flex items-center gap-2 text-accent font-bold hover:text-primary transition">
                                Clear all filters
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    @else
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                            @foreach ($products as $product)
                                <div
                                    class="bg-white rounded-2xl p-3 sm:p-4 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group flex flex-col h-full relative">

                                    <!-- Badges -->
                                    <div class="absolute top-4 left-4 z-10 flex flex-col gap-2">
                                        @if ($product->discount_price)
                                            <span
                                                class="bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-sm">
                                                -{{ round((($product->discount_price - $product->price) / $product->discount_price) * 100) }}%
                                            </span>
                                        @endif
                                        @if ($product->stock < 5 && $product->stock > 0)
                                            <span
                                                class="bg-orange-500 text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-sm">Low
                                                Stock</span>
                                        @endif
                                    </div>

                                    <!-- Image -->
                                    <a href="{{ route('product.show', $product->slug) }}"
                                        class="relative h-32 sm:h-40 lg:h-48 bg-gray-50 rounded-xl mb-3 overflow-hidden flex items-center justify-center group-hover:bg-red-50/30 transition-colors block">
                                        @if ($product->image)
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                                class="max-w-[80%] max-h-[80%] object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <span class="text-gray-400 text-xs">No Image</span>
                                        @endif

                                        <!-- Quick Action Overlay (Desktop hover) -->
                                        <div
                                            class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity items-center justify-center hidden lg:flex">
                                            <span
                                                class="bg-white text-gray-900 text-xs font-bold px-4 py-2 rounded-full shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                                View Details
                                            </span>
                                        </div>
                                    </a>

                                    <!-- Content -->
                                    <div class="flex-1 flex flex-col">
                                        <div class="mb-2">
                                            <span
                                                class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1 block">{{ data_get($product, 'category.name', 'General') }}</span>
                                            <h3
                                                class="font-bold text-sm sm:text-base text-gray-900 leading-snug line-clamp-2 group-hover:text-accent transition-colors">
                                                <a
                                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                        </div>

                                        <div class="mt-auto pt-2 sm:pt-3 border-t border-dashed border-gray-100">
                                            <div class="flex items-center justify-between mb-2 sm:mb-3">
                                                <div class="flex flex-col">
                                                    <span class="font-extrabold text-base sm:text-lg text-gray-900">KES
                                                        {{ number_format($product->price) }}</span>
                                                    @if ($product->discount_price)
                                                        <span class="text-xs text-gray-400 line-through">KES
                                                            {{ number_format($product->discount_price) }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" aria-label="Add to Cart"
                                                    class="w-full bg-gray-900 text-white py-2 sm:py-2.5 rounded-xl text-xs sm:text-sm font-bold shadow-lg shadow-gray-200 hover:bg-accent hover:shadow-red-200 transition-all duration-300 flex items-center justify-center gap-1 sm:gap-2 group/btn">
                                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-300 group-hover/btn:text-white transition-colors"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                    </svg>
                                                    <span class="hidden sm:inline">Add to Cart</span>
                                                    <span class="sm:hidden">Add</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-12">
                            {{ $products->links() }}
                        </div>
                    @endif

                </main>
            </div>
        </div>

        <!-- Mobile Filter Sidebar (Off-canvas) -->
        <div x-show="mobileFiltersOpen" x-cloak class="fixed inset-0 z-[60] lg:hidden" role="dialog" aria-modal="true">
            <div x-show="mobileFiltersOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/50 backdrop-blur-sm"
                @click="mobileFiltersOpen = false"></div>

            <div x-show="mobileFiltersOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 z-[70] w-full max-w-xs bg-white shadow-2xl overflow-y-auto">

                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">Filters</h2>
                    <button @click="mobileFiltersOpen = false" class="text-gray-400 hover:text-red-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 space-y-8">
                    <!-- Mobile Price Filter -->
                    <div>
                        <h3 class="font-bold text-gray-900 mb-4">Price Range</h3>
                        <form action="{{ route('shop') }}" method="GET" class="space-y-4">
                            @foreach (request()->except(['min_price', 'max_price', 'page']) as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <div class="grid grid-cols-2 gap-3">
                                <input type="number" name="min_price" value="{{ request('min_price') }}"
                                    placeholder="Min"
                                    class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-accent focus:border-accent w-full">
                                <input type="number" name="max_price" value="{{ request('max_price') }}"
                                    placeholder="Max"
                                    class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-accent focus:border-accent w-full">
                            </div>
                            <button type="submit"
                                class="w-full bg-accent text-white font-bold py-3 rounded-xl shadow-lg shadow-red-200">Apply
                                Filter</button>
                        </form>
                    </div>

                    <!-- Mobile Categories -->
                    <div>
                        <h3 class="font-bold text-gray-900 mb-4">Categories</h3>
                        <ul class="space-y-2">
                            @foreach ($categories as $category)
                                @if (isset($category->name) && isset($category->id))
                                    <li>
                                        <a href="{{ route('shop', array_merge(request()->except('category', 'page'), ['category' => $category->id])) }}"
                                            class="flex items-center justify-between py-2 px-3 rounded-lg {{ request('category') == $category->id ? 'bg-red-50 text-primary font-bold' : 'bg-gray-50 text-gray-700' }}">
                                            <span>{{ $category->name }}</span>
                                            @if (request('category') == $category->id)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Mobile Brands -->
                    <div>
                        <h3 class="font-bold text-gray-900 mb-4">Brands</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($brands as $brand)
                                @if (isset($brand->name) && isset($brand->id))
                                    <a href="{{ route('shop', array_merge(request()->except('brand', 'page'), ['brand' => $brand->id])) }}"
                                        class="px-3 py-1.5 rounded-full text-xs font-bold border {{ request('brand') == $brand->id ? 'bg-accent text-white border-accent' : 'bg-white text-gray-600 border-gray-200' }}">
                                        {{ $brand->name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('countdown', (endTime) => ({
                days: '00',
                hours: '00',
                minutes: '00',
                seconds: '00',
                endTime: new Date(endTime).getTime(),
                timer: null,

                init() {
                    this.updateCountdown();
                    this.timer = setInterval(() => {
                        this.updateCountdown();
                    }, 1000);
                },

                updateCountdown() {
                    const now = new Date().getTime();
                    const distance = this.endTime - now;

                    if (distance < 0) {
                        clearInterval(this.timer);
                        return;
                    }

                    this.days = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
                    this.hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 *
                        60))).padStart(2, '0');
                    this.minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)))
                        .padStart(2, '0');
                    this.seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                }
            }))
        })
    </script>
@endsection
