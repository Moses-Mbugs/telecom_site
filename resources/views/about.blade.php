@extends('layouts.app')

@section('content')

@include('partials.ad-banner')

<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">About Safe World Telecom</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Connecting you to the future with cutting-edge technology and unparalleled service.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
        <div>
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="About Us" class="rounded-2xl shadow-xl">
        </div>
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Mission</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                At Safe World Telecom, we believe in the power of connection. Our mission is to provide affordable, high-quality mobile devices and telecommunication solutions to everyone. We strive to bridge the digital divide and empower individuals and businesses to thrive in a connected world.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Founded in 2020, we have quickly grown to become a trusted name in the industry, known for our reliability, customer-centric approach, and innovative product offerings.
            </p>
        </div>
    </div>

    <div class="bg-gray-100 rounded-3xl p-12 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Why Choose Us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="w-12 h-12 bg-[#b5342a]/10 rounded-xl flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-6 h-6 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <h3 class="font-bold text-xl mb-2">Quality Products</h3>
                <p class="text-gray-600">We stock only genuine, high-quality devices from top brands.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="w-12 h-12 bg-[#b5342a]/10 rounded-xl flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-6 h-6 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                </div>
                <h3 class="font-bold text-xl mb-2">Best Prices</h3>
                <p class="text-gray-600">Competitive pricing and regular deals to save you money.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="w-12 h-12 bg-[#b5342a]/10 rounded-xl flex items-center justify-center mb-4 mx-auto">
                    <svg class="w-6 h-6 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <h3 class="font-bold text-xl mb-2">Expert Support</h3>
                <p class="text-gray-600">Our dedicated team is here to help you every step of the way.</p>
            </div>
        </div>
    </div>
</div>
@endsection
