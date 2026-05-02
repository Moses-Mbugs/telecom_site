@php
    $adActive = \App\Models\HomepageSetting::get('ad_active', '0');
    $adTitle  = \App\Models\HomepageSetting::get('ad_title', 'Special Offer');
    $adSubtitle = \App\Models\HomepageSetting::get('ad_subtitle', 'Explore our latest deals and promotions.');
    $adLink   = \App\Models\HomepageSetting::get('ad_link', '');
    $adCta    = \App\Models\HomepageSetting::get('ad_cta', 'Shop Now');
    $adBg     = \App\Models\HomepageSetting::get('ad_bg', '#b5342a');
@endphp

@if($adActive === '1')
<section class="py-10 px-6" style="background-color: {{ $adBg }}">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="text-white text-center md:text-left">
            <p class="text-xs font-bold uppercase tracking-widest mb-1 opacity-70">Sponsored</p>
            <h3 class="text-2xl md:text-3xl font-bold mb-1">{{ $adTitle }}</h3>
            <p class="text-white/80 text-sm md:text-base">{{ $adSubtitle }}</p>
        </div>
        @if($adLink)
        <a href="{{ $adLink }}"
           class="flex-shrink-0 px-8 py-3 bg-white font-bold rounded-full text-sm transition-all duration-300 hover:scale-105 shadow-lg"
           style="color: {{ $adBg }}">
            {{ $adCta }}
        </a>
        @endif
    </div>
</section>
@endif
