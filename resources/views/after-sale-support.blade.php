@extends('layouts.app')

@section('content')

@include('partials.ad-banner')

<div class="max-w-7xl mx-auto px-6 py-16">

    {{-- Hero --}}
    <div class="text-center mb-16">
        <span class="inline-block px-4 py-1.5 bg-[#b5342a]/10 text-[#b5342a] text-sm font-bold rounded-full uppercase tracking-widest mb-4">Support</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#1e3040] mb-4">After-Sale Support</h1>
        <p class="text-xl text-gray-500 max-w-2xl mx-auto">We stand behind every product we sell. Our support team is here long after your purchase.</p>
    </div>

    {{-- Quick Contact Bar --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="bg-[#1e3040] text-white rounded-2xl p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide">Call Us</p>
                <p class="font-bold text-lg">+254 712 345 678</p>
                <p class="text-xs text-gray-400">Mon–Sat, 8am–6pm</p>
            </div>
        </div>
        <div class="bg-[#b5342a] text-white rounded-2xl p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </div>
            <div>
                <p class="text-xs text-white/70 uppercase tracking-wide">WhatsApp</p>
                <p class="font-bold text-lg">+254 712 345 678</p>
                <p class="text-xs text-white/70">Quick response</p>
            </div>
        </div>
        <div class="bg-gray-100 rounded-2xl p-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-[#1e3040]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Visit a Store</p>
                <p class="font-bold text-lg text-[#1e3040]">19 Outlets Nationwide</p>
                <a href="{{ route('locations') }}" class="text-xs text-[#b5342a] hover:underline font-medium">Find nearest →</a>
            </div>
        </div>
    </div>

    {{-- Support Pillars --}}
    @php
    $pillars = [
        [
            'svg'   => '<svg class="w-7 h-7 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
            'title' => 'Warranty Coverage',
            'text'  => 'All devices come with manufacturer warranty. We assist with claims and replacements at any of our 19 outlets.',
        ],
        [
            'svg'   => '<svg class="w-7 h-7 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
            'title' => 'Device Repairs',
            'text'  => 'Our certified technicians handle screen replacements, battery swaps, software issues, and more. Fast turnaround times.',
        ],
        [
            'svg'   => '<svg class="w-7 h-7 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>',
            'title' => 'Returns & Exchanges',
            'text'  => 'Not satisfied? Return or exchange eligible items within 7 days of purchase with original receipt and packaging.',
        ],
        [
            'svg'   => '<svg class="w-7 h-7 text-[#1e3040]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>',
            'title' => 'Spare Parts',
            'text'  => 'Genuine spare parts available for all major brands we stock. Sourced directly from authorised distributors.',
        ],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        @foreach($pillars as $pillar)
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="w-14 h-14 bg-[#1e3040]/5 rounded-xl flex items-center justify-center mb-4">
                {!! $pillar['svg'] !!}
            </div>
            <h3 class="font-bold text-[#1e3040] text-lg mb-2">{{ $pillar['title'] }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed">{{ $pillar['text'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Warranty & Returns Policy --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
        <div class="bg-[#1e3040] text-white rounded-3xl p-8">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <span class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </span>
                Warranty Policy
            </h2>
            <ul class="space-y-4 text-gray-300 text-sm">
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Smartphones & tablets: <strong class="text-white">12 months</strong> manufacturer warranty</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Accessories (chargers, earphones): <strong class="text-white">3 months</strong></span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Warranty covers manufacturing defects — not physical damage or water damage</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Bring your device and original receipt to any Safe World Telecom outlet</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Assessment is free. Repair or replacement decision within 3 working days</span></li>
            </ul>
        </div>
        <div class="bg-gray-50 rounded-3xl p-8">
            <h2 class="text-2xl font-bold text-[#1e3040] mb-6 flex items-center gap-3">
                <span class="w-9 h-9 bg-[#b5342a]/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path></svg>
                </span>
                Returns & Exchange
            </h2>
            <ul class="space-y-4 text-gray-600 text-sm">
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Return window: <strong class="text-[#1e3040]">7 days</strong> from date of purchase</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Item must be unused, in original packaging with all accessories included</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Original receipt or order confirmation required</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Exchange for same or equivalent product subject to availability</span></li>
                <li class="flex items-start gap-3"><span class="text-[#b5342a] font-bold mt-0.5">→</span><span>Refunds processed within 5–7 working days (M-Pesa or bank transfer)</span></li>
            </ul>
        </div>
    </div>

    {{-- FAQs --}}
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-[#1e3040] text-center mb-10">Frequently Asked Questions</h2>
        <div class="max-w-3xl mx-auto space-y-4" x-data="{ open: null }">
            @foreach([
                ['q' => 'How do I claim a warranty?', 'a' => 'Visit any Safe World Telecom outlet with your device and original receipt. Our team will assess the device and guide you through the warranty claim process. The assessment is completely free.'],
                ['q' => 'What is not covered by warranty?', 'a' => 'Warranty does not cover physical damage (cracked screens, dents), water/liquid damage, software modifications (rooting/flashing), or damage caused by unauthorised repairs.'],
                ['q' => 'Can I repair a device I bought elsewhere?', 'a' => 'Yes. Our repair service is available to all customers regardless of where the device was purchased. Standard repair fees apply.'],
                ['q' => 'How long does a repair take?', 'a' => 'Simple repairs (screen protectors, charging port cleaning) are done same-day. Component replacements typically take 1–3 working days. Complex repairs may take up to 7 days.'],
                ['q' => 'Can I pay for my device in instalments?', 'a' => 'Yes! We offer flexible instalment plans through our deposit-and-monthly payment system. Visit any outlet or browse the shop to see eligible products.'],
                ['q' => 'What do I need to bring for an exchange?', 'a' => 'Bring the device in its original condition, all accessories included in the box, original receipt or order confirmation, and your national ID.'],
            ] as $i => $faq)
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-4 text-left">
                    <span class="font-semibold text-[#1e3040] text-sm md:text-base">{{ $faq['q'] }}</span>
                    <svg class="w-5 h-5 text-[#b5342a] transition-transform flex-shrink-0 ml-4" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-collapse class="px-6 pb-5">
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-gradient-to-r from-[#1e3040] to-[#b5342a] rounded-3xl p-10 text-center text-white">
        <h2 class="text-3xl font-bold mb-3">Still need help?</h2>
        <p class="text-white/80 mb-8 text-lg">Our support team is always ready to assist you. Reach out via any channel.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('locations') }}" class="px-8 py-3 bg-white text-[#1e3040] font-bold rounded-full hover:scale-105 transition-transform">
                Find a Store
            </a>
            <a href="{{ route('shop') }}" class="px-8 py-3 bg-white/10 border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition">
                Browse Shop
            </a>
        </div>
    </div>
</div>

@endsection
