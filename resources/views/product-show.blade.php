{{--  product-show.blade.php  --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Product Image -->
        <div class="bg-white rounded-3xl shadow-lg p-6 flex items-center justify-center">
            @if($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-h-[400px] object-contain">
            @else
                <div class="text-gray-400 text-lg">No image available</div>
            @endif
        </div>

        <!-- Product Info -->
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $product->name }}</h1>

            <div class="flex items-center space-x-4 mb-6">
                <span class="text-3xl font-bold text-red-600">KES {{ number_format($product->price) }}</span>
                @if($product->deposit_amount)
                    <span class="text-sm text-gray-500">or deposit KES {{ number_format($product->deposit_amount) }}</span>
                @endif
            </div>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ $product->description ?? 'No description provided.' }}
            </p>

            <!-- Meta -->
            <div class="grid grid-cols-2 gap-4 mb-8 text-sm">
                <div class="bg-gray-100 rounded-xl p-4">
                    <span class="font-semibold text-gray-700">Category</span>
                    <p class="text-gray-600">{{ $product->category->name }}</p>
                </div>
                <div class="bg-gray-100 rounded-xl p-4">
                    <span class="font-semibold text-gray-700">Brand</span>
                    <p class="text-gray-600">{{ $product->brand->name }}</p>
                </div>
                <div class="bg-gray-100 rounded-xl p-4">
                    <span class="font-semibold text-gray-700">Stock</span>
                    <p class="text-gray-600">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</p>
                </div>
                <div class="bg-gray-100 rounded-xl p-4">
                    <span class="font-semibold text-gray-700">Monthly Payment</span>
                    <p class="text-gray-600">
                        {{ $product->monthly_payment ? 'KES ' . number_format($product->monthly_payment) : 'N/A' }}
                    </p>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4">
               <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <button class="w-full bg-gray-900 text-white px-8 py-4 rounded-2xl hover:bg-black transition font-semibold">
                        Add to Cart
                    </button>
                </form>


                <a href="{{ route('shop') }}" class="w-full text-center border border-gray-300 px-8 py-4 rounded-2xl hover:bg-gray-100 transition font-semibold">
                    Back to Shop
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
