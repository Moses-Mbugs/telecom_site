@extends('layouts.app')

@section('content')

@include('partials.ad-banner')

<div class="max-w-7xl mx-auto px-6 py-16">

    {{-- Hero --}}
    <div class="text-center mb-16">
        <span class="inline-block px-4 py-1.5 bg-[#b5342a]/10 text-[#b5342a] text-sm font-bold rounded-full uppercase tracking-widest mb-4">What We Offer</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#1e3040] mb-4">Our Services</h1>
        <p class="text-xl text-gray-500 max-w-2xl mx-auto">Safe World Telecom delivers a full spectrum of technology and telecom solutions for individuals and businesses.</p>
    </div>

    @if($services->isEmpty())
        {{-- Default services displayed when no admin content yet --}}
        @php
        $defaultServices = [
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>', 'title' => 'Mobile Device Retail', 'description' => 'We stock a wide range of smartphones, tablets, and feature phones from leading global brands including Samsung, Tecno, Infinix, Huawei, Apple, and more. All devices are genuine and come with manufacturer warranty.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>', 'title' => 'Device Financing & Instalment Plans', 'description' => 'Can\'t pay the full price upfront? No problem. We offer flexible instalment plans allowing you to pay a deposit and spread the balance over monthly instalments. Terms vary by product.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>', 'title' => 'Device Repair & Maintenance', 'description' => 'Our in-house certified technicians handle screen replacements, battery replacements, software repairs, water damage recovery, and general servicing for all major brands.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>', 'title' => 'M-Pesa Integration Services', 'description' => 'We offer M-Pesa Paybill and Till integration services for businesses. Seamlessly accept payments through Safaricom\'s M-Pesa platform. Our team handles setup, testing, and ongoing support.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>', 'title' => 'Internet & Connectivity Solutions', 'description' => 'From personal mobile data solutions to enterprise fiber and VoIP setups, we help individuals and businesses stay connected reliably and affordably.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>', 'title' => 'Corporate & Bulk Procurement', 'description' => 'We serve businesses and institutions that require bulk device procurement, managed contracts, and dedicated account management. Special corporate pricing available.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>', 'title' => 'Digital Literacy Training', 'description' => 'As part of our commitment to digital inclusion, we offer basic digital literacy sessions for individuals, schools, and community groups to help bridge the digital divide.'],
            ['svg' => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>', 'title' => 'Extended Warranty & Protection Plans', 'description' => 'Protect your investment beyond the standard manufacturer warranty. Our protection plans cover accidental damage, extended repairs, and priority service.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($defaultServices as $service)
            <div class="group bg-white border border-gray-100 rounded-2xl p-7 shadow-sm hover:shadow-lg hover:border-[#b5342a]/30 transition-all duration-300">
                <div class="w-14 h-14 bg-[#b5342a]/10 rounded-xl flex items-center justify-center mb-5">
                    {!! $service['svg'] !!}
                </div>
                <h3 class="text-xl font-bold text-[#1e3040] mb-3">{{ $service['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service['description'] }}</p>
            </div>
            @endforeach
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="group bg-white border border-gray-100 rounded-2xl p-7 shadow-sm hover:shadow-lg hover:border-[#b5342a]/30 transition-all duration-300">
                @if($service->icon)
                    <div class="text-4xl mb-5">{{ $service->icon }}</div>
                @endif
                <h3 class="text-xl font-bold text-[#1e3040] mb-3">{{ $service->title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    @endif

    {{-- CTA --}}
    <div class="mt-20 bg-gradient-to-r from-[#1e3040] to-[#2d4a60] rounded-3xl p-10 text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to get started?</h2>
        <p class="text-gray-300 text-lg mb-8">Visit any of our 19 outlets or reach out to our team for a consultation.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('shop') }}" class="px-8 py-3 bg-[#b5342a] text-white font-bold rounded-full hover:scale-105 transition-transform">
                Shop Now
            </a>
            <a href="{{ route('locations') }}" class="px-8 py-3 bg-white/10 border border-white/30 font-bold rounded-full hover:bg-white/20 transition">
                Find a Store
            </a>
        </div>
    </div>
</div>

@endsection
