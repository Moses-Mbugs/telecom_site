@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-12 gap-10">

    {{-- LEFT: Customer Details --}}
    <div class="col-span-12 md:col-span-7 bg-white rounded-2xl shadow p-8">
        <h2 class="text-2xl font-bold mb-6">📦 Delivery Details</h2>

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
        <h2 class="text-2xl font-bold mb-6">🧾 Order Summary</h2>

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

        <p class="mt-4 text-sm text-gray-600">
            💡 Payment will be completed via M-Pesa in the next step.
        </p>
    </div>

</div>
@endsection
