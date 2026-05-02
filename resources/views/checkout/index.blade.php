@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-12 gap-10">

    {{-- LEFT: Customer Details --}}
    <div class="col-span-12 md:col-span-7 bg-white rounded-2xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            Delivery Details
        </h2>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Full Name</label>
                <input type="text" name="full_name" required
                       class="w-full border rounded-xl px-4 py-3 focus:ring focus:ring-red-300">
            </div>

            <div>
                <label class="block font-semibold mb-1">Phone Number</label>
                <input type="text" name="phone" placeholder="07XXXXXXXX" required
                       class="w-full border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block font-semibold mb-1">Email (optional)</label>
                <input type="email" name="email"
                       class="w-full border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block font-semibold mb-1">Delivery Location</label>
                <input type="text" name="location" required
                       class="w-full border rounded-xl px-4 py-3">
            </div>

            <button class="w-full bg-gray-900 text-white py-4 rounded-xl font-semibold hover:bg-black transition">
                Save & Continue
            </button>
        </form>
    </div>

    {{-- RIGHT: Order Summary --}}
    <div class="col-span-12 md:col-span-5 bg-gray-50 rounded-2xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            Order Summary
        </h2>

        <div class="space-y-4">
            @foreach($cart as $item)
                <div class="flex justify-between border-b pb-2">
                    <div>
                        <p class="font-semibold">{{ $item['name'] }}</p>
                        <p class="text-sm text-gray-600">
                            Qty: {{ $item['quantity'] }}
                        </p>
                    </div>
                    <p class="font-semibold">
                        KES {{ number_format($item['price'] * $item['quantity']) }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-6 border-t pt-4 flex justify-between text-xl font-bold">
            <span>Total</span>
            <span>KES {{ number_format($total) }}</span>
        </div>

        <p class="mt-4 text-sm text-gray-600 flex items-start gap-2">
            <svg class="w-4 h-4 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
            Payment will be completed via M-Pesa in the next step.
        </p>
    </div>

</div>
@endsection
