@extends('layouts.app')

@section('content')

{{-- ========================= --}}
{{-- SCREEN 1 : HERO SECTION --}}
{{-- ========================= --}}
<section class="hero bg-gray-100 py-24">
    <div class="container text-center fade-in">
        <h1 class="text-5xl font-bold text-blue-700">
            Empowering Kenya With Seamless Connectivity
        </h1>

        <p class="text-lg mt-4 text-gray-600">
            Transforming lives through reliable telecom solutions.
        </p>

        <a href="#services"
           class="mt-8 inline-block bg-blue-600 text-white px-8 py-3 rounded-lg shadow hover:bg-blue-700 transition">
            Explore our products
        </a>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
            <div>
                <h3 class="text-4xl font-bold">19</h3>
                <p>Retail Outlets</p>
            </div>

            <div>
                <h3 class="text-4xl font-bold">3</h3>
                <p>Franchised Locations</p>
            </div>

            <div>
                <h3 class="text-4xl font-bold">800+</h3>
                <p>M-Pesa Sub-agencies</p>
            </div>

            <div>
                <h3 class="text-4xl font-bold">16</h3>
                <p>Mobile Vans</p>
            </div>
        </div>
    </div>
</section>



{{-- ========================= --}}
{{-- SCREEN 2 : SERVICES GRID --}}
{{-- ========================= --}}
<section id="services" class="py-24 bg-white">
    <div class="container fade-in">
        <h2 class="text-4xl font-bold text-center mb-12">Our Services</h2>

        <div class="grid md:grid-cols-3 gap-10">

            {{-- Top-up --}}
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition bg-gray-50">
                <h3 class="text-2xl font-bold">Pinless Airtime Top-up</h3>
                <p class="text-gray-600 mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <a href="#topup"
                   class="mt-5 inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Top Up Now
                </a>
            </div>

            {{-- M-Pesa Solutions --}}
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition bg-gray-50">
                <h3 class="text-2xl font-bold">M-Pesa Solutions</h3>
                <p class="text-gray-600 mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <a href="#"
                   class="mt-5 inline-block bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
                    Explore M-Pesa Solutions
                </a>
            </div>

            {{-- Fiber & IoT --}}
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition bg-gray-50">
                <h3 class="text-2xl font-bold">Fibre & IoT Solutions</h3>
                <p class="text-gray-600 mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                </p>
                <a href="#"
                   class="mt-5 inline-block bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                    Get A Quote
                </a>
            </div>

        </div>
    </div>
</section>



{{-- ========================= --}}
{{-- SCREEN 3 : TOP-UP SECTION --}}
{{-- ========================= --}}
<section id="topup" class="py-24 bg-blue-50">
    <div class="container text-center fade-in">

        <h2 class="text-4xl font-bold mb-6">Top Up Your Line With A Single Click</h2>

        @if(session('success'))
            <p class="text-green-700 font-semibold mb-4">
                {{ session('success') }}
            </p>
        @endif

        <form action="{{ route('topup') }}" method="POST" class="mt-8">
            @csrf

            <input type="text" name="phone" placeholder="Enter phone number"
                   class="border rounded px-4 py-2 w-64 shadow">

            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded ml-2 shadow hover:bg-blue-700 transition">
                Top up
            </button>
        </form>

        <a href="#"
           class="mt-8 inline-block text-blue-700 underline hover:text-blue-900">
           Get A Quote
        </a>

    </div>
</section>



{{-- ========================= --}}
{{-- SCREEN 4 : BLOG & FOOTER --}}
{{-- ========================= --}}
<section id="blog" class="py-24 bg-white">
    <div class="container fade-in">
        <h2 class="text-4xl font-bold text-center mb-12">Insights & Updates</h2>

        <div class="grid md:grid-cols-4 gap-8">

            <div class="border p-6 rounded shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl">5G Revolution</h3>
                <p class="text-gray-600 mt-3">Discover how 5G is changing telecom…</p>
            </div>

            <div class="border p-6 rounded shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl">VoIP Future</h3>
                <p class="text-gray-600 mt-3">The next era of voice communication…</p>
            </div>

            <div class="border p-6 rounded shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl">Cybersecurity in Telecom</h3>
                <p class="text-gray-600 mt-3">Key threats and security strategies…</p>
            </div>

            <div class="border p-6 rounded shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl">Types of Fibre Optic Cables</h3>
                <p class="text-gray-600 mt-3">Single-mode vs multi-mode explained…</p>
            </div>

        </div>
    </div>
</section>


{{-- FOOTER --}}
<footer class="bg-gray-900 text-white py-16 mt-16">
    <div class="container grid md:grid-cols-4 gap-10">

        <div>
            <h4 class="font-bold mb-4">Products</h4>
            <p class="hover:underline cursor-pointer">Pinless Top-up</p>
            <p class="hover:underline cursor-pointer">Fibre</p>
        </div>

        <div>
            <h4 class="font-bold mb-4">Company</h4>
            <p class="hover:underline cursor-pointer">About Us</p>
            <p class="hover:underline cursor-pointer">Careers</p>
            <p class="hover:underline cursor-pointer">Our Shops</p>
        </div>

        <div>
            <h4 class="font-bold mb-4">Support</h4>
            <p class="hover:underline cursor-pointer">FAQs</p>
            <p class="hover:underline cursor-pointer">Recharge</p>
        </div>

        <div>
            <h4 class="font-bold mb-4">Contact</h4>
            <p>Phone: 0790 000 000</p>
            <p>Email: info@telecom.co.ke</p>
        </div>

    </div>
</footer>

@endsection
