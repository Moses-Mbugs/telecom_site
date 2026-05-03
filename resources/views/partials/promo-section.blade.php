@php
    $promoActive = \App\Models\HomepageSetting::get('promo_active', '0');
    $promoImage  = \App\Models\HomepageSetting::get('promo_image', '');
    $promoVideo  = \App\Models\HomepageSetting::get('promo_video', '');
    $promoTitle  = \App\Models\HomepageSetting::get('promo_title', '');
    $promoText   = \App\Models\HomepageSetting::get('promo_text', '');
    $promoCta    = \App\Models\HomepageSetting::get('promo_cta', '');
    $promoLink   = \App\Models\HomepageSetting::get('promo_link', '');
@endphp

@if($promoActive === '1' && ($promoImage || $promoVideo))
<section class="relative h-[420px] md:h-[500px] overflow-hidden">

    {{-- Background media --}}
    @if($promoVideo)
        <video
            src="{{ Str::startsWith($promoVideo, 'http') ? $promoVideo : asset('storage/' . $promoVideo) }}"
            class="absolute inset-0 w-full h-full object-cover"
            autoplay loop muted playsinline>
        </video>
    @else
        <img
            src="{{ Str::startsWith($promoImage, 'http') ? $promoImage : asset('storage/' . $promoImage) }}"
            class="absolute inset-0 w-full h-full object-cover"
            alt="Promotion">
    @endif

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>

    {{-- Content --}}
    <div class="relative z-10 h-full flex flex-col items-start justify-center px-8 md:px-16 max-w-4xl">
        @if($promoTitle)
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                {!! nl2br(e($promoTitle)) !!}
            </h2>
        @endif
        @if($promoText)
            <p class="text-white/80 text-base md:text-lg mb-8 max-w-xl leading-relaxed">
                {{ $promoText }}
            </p>
        @endif
        @if($promoCta && $promoLink)
            <a href="{{ $promoLink }}"
               class="inline-block px-8 py-3 bg-[#b5342a] text-white font-bold rounded-full text-sm hover:bg-white hover:text-[#b5342a] transition-all duration-300 shadow-xl hover:scale-105">
                {{ $promoCta }}
            </a>
        @endif
    </div>

</section>
@endif
