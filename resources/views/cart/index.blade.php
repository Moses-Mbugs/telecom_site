{{--  cart/index.blade.php  --}}
@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-8 flex items-center gap-3">
        <svg class="w-8 h-8 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        Shopping Cart
    </h1>

    @if(empty($cart))
        <p class="text-gray-600">Your cart is empty.</p>
        <a href="{{ route('shop') }}" class="text-red-600 font-semibold">Continue shopping →</a>
    @else
        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4 text-left">Product</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Qty</th>
                        <th class="p-4">Total</th>
                        <th class="p-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp

                    @foreach($cart as $item)
                        @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                        <tr class="border-t">
                            <td class="p-4 font-semibold">{{ $item['name'] }}</td>
                            <td class="p-4">KES {{ number_format($item['price']) }}</td>
                            <td class="p-4">
                                <form method="POST" action="{{ route('cart.update', $item['id']) }}">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                           class="w-16 border rounded px-2 py-1">
                                </form>
                            </td>
                            <td class="p-4 font-semibold">KES {{ number_format($total) }}</td>
                            <td class="p-4">
                                <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                    @csrf
                                    <button class="text-red-600">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-6 flex justify-between items-center">
                <span class="text-xl font-bold">Total: KES {{ number_format($grandTotal) }}</span>
                <a href="{{ route('checkout.index') }}"   class="bg-red-600 text-white px-8 py-3 rounded-xl font-semibold">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
