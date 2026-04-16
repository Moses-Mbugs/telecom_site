@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@section('content')

    <!-- Top Advert Strip -->
    @if (isset($shopPage) && $shopPage->top_alert_active)
        <div class="text-white text-xs md:text-sm py-2.5 text-center font-bold tracking-wider relative z-50"
            style="background-color: {{ $shopPage->top_alert_color ?? '#dc2626' }}">
            {{ $shopPage->top_alert_content }}
        </div>
    @elseif(isset($flashSales) && count($flashSales) > 0)
        @php $flashSale = $flashSales[0]; @endphp
        <div class="bg-gradient-to-r from-red-600 to-red-500 text-white text-xs md:text-sm py-2.5 text-center font-bold tracking-wider relative z-50">
            🚀 {{ $flashSale->name ?? 'FLASH SALE' }}: UP TO {{ $flashSale->discount_percentage ?? '50' }}% OFF SELECTED PHONES! LIMITED TIME OFFER.
        </div>
    @else
        <div class="bg-gradient-to-r from-red-600 to-red-500 text-white text-xs md:text-sm py-2.5 text-center font-bold tracking-wider relative z-50">
            🚀 FLASH SALE: UP TO 50% OFF SELECTED PHONES! LIMITED TIME OFFER.
        </div>
    @endif

    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-40 transition-all duration-300">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-4 md:gap-6">
                    <a href="{{ route('shop') }}"
                        class="hidden md:flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 text-gray-600 hover:bg-red-100 hover:text-accent transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <a href="/" class="flex items-center flex-shrink-0">
                        <img src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World" class="h-8 md:h-10 object-contain">
                    </a>
                </div>

                <div class="flex-1 max-w-2xl hidden md:block mx-4">
                    <form action="{{ route('shop') }}" method="GET" class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search products..."
                            class="w-full bg-gray-100 border-2 border-transparent rounded-full py-2.5 px-6 pr-12 focus:bg-white focus:border-accent focus:ring-0 transition-all duration-300">
                        <button type="submit"
                            class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-accent text-white p-2 rounded-full hover:bg-primary hover:shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="flex items-center gap-4 md:gap-8">
                    <a href="{{ route('cart.index') }}" class="flex items-center gap-3 group">
                        <div class="relative p-2">
                            <svg class="w-7 h-7 text-gray-600 group-hover:text-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="absolute top-0 right-0 bg-accent text-white text-[10px] font-bold h-5 w-5 flex items-center justify-center rounded-full border-2 border-white">
                                {{ count(session('cart', [])) }}
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Breadcrumbs -->
    <div class="bg-gray-50 border-b border-gray-200">
        <div class="container mx-auto px-4 py-4">
            <nav class="text-sm font-medium text-gray-500">
                <ol class="list-none p-0 inline-flex flex-wrap gap-2">
                    <li class="flex items-center">
                        <a href="/" class="hover:text-accent transition-colors">Home</a>
                        <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('shop') }}" class="hover:text-accent transition-colors">Shop</a>
                        <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </li>
                    @if (isset($product->category->name) && isset($product->category->id))
                        <li class="flex items-center">
                            <a href="{{ route('shop', ['category' => $product->category->id]) }}" class="hover:text-accent transition-colors">{{ $product->category->name }}</a>
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </li>
                    @endif
                    <li class="text-accent font-bold truncate max-w-[200px]">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">

        {{-- =====================================================================
             TOP SECTION: Product (left 3/4) + Ad Banner Sidebar (right 1/4)
        ====================================================================== --}}
        <div class="flex flex-col xl:flex-row gap-8">

            {{-- Product Detail (takes up most of the width) --}}
            <div class="flex-1 min-w-0">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 xl:gap-16">

                    <!-- Left: Images -->
                    <div class="space-y-6">
                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 flex items-center justify-center h-[440px] relative overflow-hidden group">
                            @if ($product->image)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                    class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105" id="main-image">
                            @else
                                <span class="text-gray-400 text-lg">No Image Available</span>
                            @endif

                            @if($product->is_featured)
                                <span class="absolute top-6 left-6 bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Featured</span>
                            @endif
                            @if($product->discount_price)
                                <span class="absolute top-6 right-6 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Sale</span>
                            @endif
                        </div>

                        @if($product->image)
                        <div class="flex gap-4 overflow-x-auto pb-2">
                            <div class="w-24 h-24 rounded-xl border-2 border-accent p-2 cursor-pointer bg-white flex-shrink-0">
                                <img src="{{ $product->image_url }}" class="w-full h-full object-contain">
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Right: Product Info -->
                    <div class="flex flex-col h-full">
                        <div class="mb-2 flex items-center gap-3">
                            @if (data_get($product, 'brand.name'))
                                <span class="text-sm font-bold text-gray-500 uppercase tracking-wider">{{ data_get($product, 'brand.name') }}</span>
                            @endif
                            @if($product->stock > 0)
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-0.5 rounded-md">In Stock</span>
                            @else
                                <span class="bg-red-100 text-red-700 text-xs font-bold px-2 py-0.5 rounded-md">Out of Stock</span>
                            @endif
                        </div>

                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">{{ $product->name }}</h1>

                        <div class="flex items-end gap-4 mb-8">
                            <span class="text-4xl font-black text-accent">KES {{ number_format($product->price) }}</span>
                            @if ($product->discount_price)
                                <span class="text-xl text-gray-400 line-through mb-1">KES {{ number_format($product->discount_price) }}</span>
                                <span class="text-sm font-bold text-red-500 mb-2 bg-red-50 px-2 py-1 rounded-md">
                                    Save KES {{ number_format($product->discount_price - $product->price) }}
                                </span>
                            @endif
                        </div>

                        @if($product->deposit_amount || $product->monthly_payment)
                        <div class="bg-gradient-to-br from-red-50 to-gray-50 rounded-2xl p-6 mb-8 border border-red-100">
                            <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Flexible Payment Options
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                @if($product->deposit_amount)
                                <div>
                                    <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Deposit</span>
                                    <span class="text-xl font-bold text-gray-900">KES {{ number_format($product->deposit_amount) }}</span>
                                </div>
                                @endif
                                @if($product->monthly_payment)
                                <div>
                                    <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider">Monthly</span>
                                    <span class="text-xl font-bold text-gray-900">KES {{ number_format($product->monthly_payment) }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="prose prose-sm text-gray-600 mb-8 max-w-none">
                            {{ Str::limit(strip_tags($product->description), 200) }}
                        </div>

                        <!-- Actions -->
                        <div class="mt-auto space-y-4">
                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="flex gap-4">
                                @csrf
                                <div class="w-24">
                                    <label class="sr-only">Quantity</label>
                                    <input type="number" name="quantity" value="1" min="1" max="10"
                                        class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-center font-bold focus:ring-accent focus:border-accent">
                                </div>
                                <button type="submit"
                                    class="flex-1 bg-gray-900 text-white py-4 rounded-xl font-bold text-lg hover:bg-accent shadow-xl hover:shadow-red-500/30 transition-all duration-300 flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    Add to Cart
                                </button>
                            </form>

                            <div class="flex gap-4">
                                <a href="https://wa.me/?text=Check out {{ $product->name }} on Safe World Telecom! {{ url()->current() }}" target="_blank"
                                    class="flex-1 border-2 border-green-100 bg-green-50 text-green-700 py-3 rounded-xl font-bold hover:bg-green-100 transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    Share
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- =====================================================================
                 AD BANNER SIDEBAR — fixed width, sticks to the right
            ====================================================================== --}}
            @if (isset($shopPage) && $shopPage->product_banner_image)
                <aside class="hidden xl:flex flex-col w-52 flex-shrink-0">
                    <div class="sticky top-24">
                        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest mb-2 text-center">Sponsored</p>
                        @if ($shopPage->product_banner_link)
                            <a href="{{ $shopPage->product_banner_link }}" target="_blank" rel="noopener" class="block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                                <img src="{{ $shopPage->product_banner_image }}" alt="Advertisement"
                                    class="w-full object-cover rounded-2xl hover:scale-105 transition-transform duration-500">
                            </a>
                        @else
                            <div class="rounded-2xl overflow-hidden shadow-md">
                                <img src="{{ $shopPage->product_banner_image }}" alt="Advertisement"
                                    class="w-full object-cover rounded-2xl">
                            </div>
                        @endif
                    </div>
                </aside>
            @endif

        </div>
        {{-- End top section --}}

        <!-- Product Details Tabs -->
        <div class="mt-20">
            <div class="border-b border-gray-200" x-data="{ tab: 'description' }">
                <div class="flex gap-8 mb-8 overflow-x-auto">
                    <button @click="tab = 'description'"
                        :class="{'text-accent border-accent': tab === 'description', 'text-gray-500 border-transparent hover:text-gray-700': tab !== 'description'}"
                        class="pb-4 border-b-2 font-bold text-lg whitespace-nowrap transition-colors">Description</button>
                    <button @click="tab = 'specifications'"
                        :class="{'text-accent border-accent': tab === 'specifications', 'text-gray-500 border-transparent hover:text-gray-700': tab !== 'specifications'}"
                        class="pb-4 border-b-2 font-bold text-lg whitespace-nowrap transition-colors">Specifications</button>
                    <button @click="tab = 'reviews'"
                        :class="{'text-accent border-accent': tab === 'reviews', 'text-gray-500 border-transparent hover:text-gray-700': tab !== 'reviews'}"
                        class="pb-4 border-b-2 font-bold text-lg whitespace-nowrap transition-colors">Reviews ({{ $reviewsCount ?? 0 }})</button>
                </div>

                <div x-show="tab === 'description'" class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 prose max-w-none">
                    {!! nl2br(e($product->description)) !!}
                </div>

                <div x-show="tab === 'specifications'" class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100" style="display: none;">
                    @if(!empty($product->specifications) && count($product->specifications) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($product->specifications as $spec)
                                <div class="flex justify-between py-3 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">{{ $spec['label'] ?? 'Feature' }}</span>
                                    <span class="font-bold text-gray-900">{{ $spec['value'] ?? '-' }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">No specific specifications listed for this product.</p>
                    @endif
                </div>

                <div x-show="tab === 'reviews'" class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100" style="display: none;">
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-8">
                        <div class="flex-1">
                            <div class="flex items-center justify-between gap-4 mb-6">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Customer Reviews</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $reviewsCount ?? 0 }} {{ Str::plural('review', $reviewsCount ?? 0) }}</p>
                                </div>
                                @if(($reviewsCount ?? 0) > 0)
                                    <div class="text-right">
                                        <div class="flex items-center justify-end gap-1 text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-5 h-5" fill="{{ $i <= floor($reviewsAverage ?? 0) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.044 6.293a1 1 0 00.95.69h6.613c.969 0 1.371 1.24.588 1.81l-5.35 3.887a1 1 0 00-.364 1.118l2.044 6.293c.3.921-.755 1.688-1.54 1.118l-5.35-3.887a1 1 0 00-1.175 0l-5.35 3.887c-.784.57-1.838-.197-1.539-1.118l2.044-6.293a1 1 0 00-.364-1.118L2.98 11.72c-.783-.57-.38-1.81.588-1.81h6.614a1 1 0 00.95-.69l2.044-6.293z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <p class="text-sm font-bold text-gray-900 mt-1">{{ $reviewsAverage ?? 0 }}/5</p>
                                    </div>
                                @endif
                            </div>

                            @if(($reviewsCount ?? 0) === 0)
                                <div class="text-center py-10">
                                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                    <h4 class="text-lg font-bold text-gray-800 mb-2">No Reviews Yet</h4>
                                    <p class="text-gray-500 mb-6">Be the first to review this product.</p>
                                    @auth
                                        <a href="#write-review" class="inline-block bg-accent text-white px-6 py-3 rounded-xl font-bold hover:bg-primary transition">Write a Review</a>
                                    @else
                                        <a href="{{ route('login') }}" class="inline-block bg-accent text-white px-6 py-3 rounded-xl font-bold hover:bg-primary transition">Sign in to review</a>
                                    @endauth
                                </div>
                            @else
                                <div class="space-y-6">
                                    @foreach(($reviews ?? []) as $review)
                                        <div class="border border-gray-100 rounded-2xl p-6">
                                            <div class="flex items-start justify-between gap-4">
                                                <div>
                                                    <p class="font-bold text-gray-900">{{ $review->user->name ?? 'Anonymous' }}</p>
                                                    <p class="text-xs text-gray-400 mt-1">{{ optional($review->created_at)->format('d M Y') }}</p>
                                                </div>
                                                <div class="flex items-center gap-1 text-yellow-400">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <svg class="w-4 h-4" fill="{{ $i <= (int) $review->rating ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.044 6.293a1 1 0 00.95.69h6.613c.969 0 1.371 1.24.588 1.81l-5.35 3.887a1 1 0 00-.364 1.118l2.044 6.293c.3.921-.755 1.688-1.54 1.118l-5.35-3.887a1 1 0 00-1.175 0l-5.35 3.887c-.784.57-1.838-.197-1.539-1.118l2.044-6.293a1 1 0 00-.364-1.118L2.98 11.72c-.783-.57-.38-1.81.588-1.81h6.614a1 1 0 00.95-.69l2.044-6.293z"></path>
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>
                                            @if(!empty($review->title))
                                                <p class="mt-4 font-bold text-gray-800">{{ $review->title }}</p>
                                            @endif
                                            <p class="mt-3 text-gray-600">{{ $review->comment }}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-10 flex justify-center">
                                    @auth
                                        <a href="#write-review" class="inline-block bg-accent text-white px-6 py-3 rounded-xl font-bold hover:bg-primary transition">Write a Review</a>
                                    @else
                                        <a href="{{ route('login') }}" class="inline-block bg-accent text-white px-6 py-3 rounded-xl font-bold hover:bg-primary transition">Sign in to review</a>
                                    @endauth
                                </div>
                            @endif
                        </div>

                        <div class="w-full lg:w-96">
                            <div id="write-review" class="border border-gray-100 rounded-3xl p-6">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Write a Review</h4>
                                <p class="text-sm text-gray-500 mb-6">Share your experience with this product.</p>

                                @auth
                                    <form action="{{ route('product.reviews.store', $product->slug) }}" method="POST" class="space-y-4">
                                        @csrf
                                        <div>
                                            <label class="block text-sm font-bold text-gray-700 mb-2">Rating</label>
                                            <select name="rating" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-red-200 focus:border-accent outline-none">
                                                @for($i = 5; $i >= 1; $i--)
                                                    <option value="{{ $i }}" {{ (int) old('rating', 5) === $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('rating')<p class="text-xs text-red-500 mt-2">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-bold text-gray-700 mb-2">Title</label>
                                            <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-red-200 focus:border-accent outline-none">
                                            @error('title')<p class="text-xs text-red-500 mt-2">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-bold text-gray-700 mb-2">Comment</label>
                                            <textarea name="comment" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-red-200 focus:border-accent outline-none resize-none">{{ old('comment') }}</textarea>
                                            @error('comment')<p class="text-xs text-red-500 mt-2">{{ $message }}</p>@enderror
                                        </div>

                                        <button type="submit" class="w-full bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-accent transition-colors">Submit Review</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="block w-full text-center bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-accent transition-colors">Sign in to review</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->isNotEmpty())
            <div class="mt-20">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-2">
                    <span class="text-accent">✦</span> Related Products
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
                            <div class="relative h-48 bg-gray-50 p-6 flex items-center justify-center">
                                @if ($related->image)
                                    <img src="{{ $related->image }}" alt="{{ $related->name }}" class="max-w-full max-h-full object-contain group-hover:scale-110 transition duration-500">
                                @else
                                    <span class="text-gray-400 text-sm">No Image</span>
                                @endif
                                <a href="{{ route('product.show', $related->slug) }}" class="absolute inset-0 z-10"></a>
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-gray-800 text-sm leading-snug line-clamp-2 mb-2 group-hover:text-accent transition-colors">
                                    <a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a>
                                </h3>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-gray-900">KES {{ number_format($related->price) }}</span>
                                    @if ($related->discount_price)
                                        <span class="text-xs text-red-500 font-bold bg-red-50 px-2 py-1 rounded">-{{ round((($related->discount_price - $related->price)/$related->discount_price)*100) }}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Brands Section -->
        @if(isset($brands) && count($brands) > 0)
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-2">
                <span class="text-accent">✦</span> Shop by Brand
            </h2>
            <div class="flex flex-wrap gap-4">
                @foreach($brands as $brand)
                    @if(isset($brand->name) && isset($brand->id))
                        <a href="{{ route('shop', ['brand' => $brand->id]) }}"
                           class="px-6 py-3 bg-white border border-gray-200 rounded-xl font-bold text-gray-600 hover:border-accent hover:text-accent hover:shadow-md transition-all">
                            {{ $brand->name }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        @endif

    </div>

@endsection
