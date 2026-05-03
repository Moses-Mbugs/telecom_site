@extends('admin.layout')

@section('page-title', 'Manage Homepage')

@section('content')
<form action="{{ route('admin.homepage.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf

    {{-- Hero Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-5 pb-3 border-b">🦸 Hero Section</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Hero Title</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Hero Subtitle</label>
                <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div class="md:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Hero Background Image</label>
                        @if(!empty($settings['hero_image']))
                            <div class="mb-2">
                                @php $img = $settings['hero_image']; @endphp
                                <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-24 rounded-lg object-cover" alt="Current hero image">
                            </div>
                        @endif
                        <input type="file" name="hero_image_file" accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                        <p class="text-xs text-gray-400 mt-1">Fallback if video is not set.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Hero Background Video</label>
                        @if(!empty($settings['hero_video']))
                            <div class="mb-2 flex items-center justify-between">
                                <span class="text-sm text-green-600 font-medium flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    Video Uploaded
                                </span>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="remove_hero_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    <span class="ml-2 text-sm text-red-600">Remove Video</span>
                                </label>
                            </div>
                        @endif
                        <input type="file" name="hero_video_file" accept="video/mp4,video/x-m4v,video/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                        <p class="text-xs text-gray-400 mt-1">Takes precedence over image. Max 50MB.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Journey Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-5 pb-3 border-b flex items-center gap-2">
            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            Our Journey Section
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Journey Title</label>
                <input type="text" name="journey_title" value="{{ old('journey_title', $settings['journey_title'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Journey Image</label>
                @if(!empty($settings['journey_image']))
                    @php $img = $settings['journey_image']; @endphp
                    <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-16 rounded-lg object-cover mb-2" alt="Journey image">
                @endif
                <input type="file" name="journey_image_file" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Journey Text</label>
                <textarea name="journey_text" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('journey_text', $settings['journey_text'] ?? '') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Plans Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-5 pb-3 border-b">📶 Data Plans Section</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Plans Title</label>
                <input type="text" name="plans_title" value="{{ old('plans_title', $settings['plans_title'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Plans Background Image</label>
                    @if(!empty($settings['plans_image']))
                        @php $img = $settings['plans_image']; @endphp
                        <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-16 rounded-lg object-cover mb-2" alt="Plans image">
                    @endif
                    <input type="file" name="plans_image_file" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                    <p class="text-xs text-gray-400 mt-1">Fallback if video is not set.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Plans Background Video</label>
                    @if(!empty($settings['plans_video']))
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-sm text-green-600 font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Video Uploaded
                            </span>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="remove_plans_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span class="ml-2 text-sm text-red-600">Remove Video</span>
                            </label>
                        </div>
                    @endif
                    <input type="file" name="plans_video_file" accept="video/mp4,video/x-m4v,video/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                    <p class="text-xs text-gray-400 mt-1">Takes precedence over image. Max 50MB.</p>
                </div>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Plans Text</label>
                <textarea name="plans_text" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('plans_text', $settings['plans_text'] ?? '') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Why Choose Us --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-5 pb-3 border-b">⭐ Why Choose Us Cards</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([1,2,3] as $i)
            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Card {{ $i }}</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Title</label>
                    <input type="text" name="why_us_{{ $i }}_title" value="{{ old('why_us_'.$i.'_title', $settings['why_us_'.$i.'_title'] ?? '') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Text</label>
                    <textarea name="why_us_{{ $i }}_text" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('why_us_'.$i.'_text', $settings['why_us_'.$i.'_text'] ?? '') }}</textarea>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Shop Video Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-5 pb-3 border-b">🛒 Shop Page Video Section</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Shop Video Title</label>
                <input type="text" name="shop_video_title" value="{{ old('shop_video_title', $settings['shop_video_title'] ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Shop Video</label>
                @if(!empty($settings['shop_video']))
                    <div class="mb-2 flex items-center justify-between">
                        <span class="text-sm text-green-600 font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            Video Uploaded
                        </span>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remove_shop_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                            <span class="ml-2 text-sm text-red-600">Remove Video</span>
                        </label>
                    </div>
                @endif
                <input type="file" name="shop_video_file" accept="video/mp4,video/x-m4v,video/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                <p class="text-xs text-gray-400 mt-1">Max 50MB.</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Shop Video Text</label>
                <textarea name="shop_video_text" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('shop_video_text', $settings['shop_video_text'] ?? '') }}</textarea>
            </div>
        </div>
    </div>

    {{-- Promotional Media Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between pb-3 border-b mb-5">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">🎬 Promotional Section</h2>
                <p class="text-xs text-gray-400 mt-0.5">Full-width image or video section shown on every page, just above the footer.</p>
            </div>
            <label class="flex items-center gap-2 cursor-pointer select-none">
                <div class="relative">
                    <input type="checkbox" name="promo_active" value="1" id="promo_active"
                        {{ ($settings['promo_active'] ?? '0') === '1' ? 'checked' : '' }}
                        class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-purple-600 transition-colors"></div>
                    <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                </div>
                <span class="text-sm font-medium text-gray-600">Show Section</span>
            </label>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- Media uploads --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Background Image</label>
                @if(!empty($settings['promo_image']))
                    <div class="mb-2">
                        @php $pi = $settings['promo_image']; @endphp
                        <img src="{{ Str::startsWith($pi, 'http') ? $pi : asset('storage/' . $pi) }}"
                             class="h-24 w-full rounded-lg object-cover" alt="Current promo image">
                    </div>
                @endif
                <input type="file" name="promo_image_file" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                <p class="text-xs text-gray-400 mt-1">Used when no video is set. Recommended: 1920×600px or wider.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Background Video</label>
                @if(!empty($settings['promo_video']))
                    <div class="mb-2 flex items-center justify-between">
                        <span class="text-sm text-green-600 font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            Video Uploaded
                        </span>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remove_promo_video" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                            <span class="ml-2 text-sm text-red-600">Remove Video</span>
                        </label>
                    </div>
                @endif
                <input type="file" name="promo_video_file" accept="video/mp4,video/x-m4v,video/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                <p class="text-xs text-gray-400 mt-1">Video takes priority over image. Max 50MB. Plays silently on a loop.</p>
            </div>

            {{-- Text fields --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Headline</label>
                <input type="text" name="promo_title" value="{{ old('promo_title', $settings['promo_title'] ?? '') }}"
                    placeholder="e.g. Up to 30% Off All Samsung Devices"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                <p class="text-xs text-gray-400 mt-1">Use a new line (Enter) to break the headline across two lines.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1">Subtitle / Body Text</label>
                <textarea name="promo_text" rows="2"
                    placeholder="e.g. Limited time offer — visit any of our 19 outlets or shop online."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('promo_text', $settings['promo_text'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Button Label</label>
                <input type="text" name="promo_cta" value="{{ old('promo_cta', $settings['promo_cta'] ?? '') }}"
                    placeholder="e.g. Shop Now"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Button Link</label>
                <input type="url" name="promo_link" value="{{ old('promo_link', $settings['promo_link'] ?? '') }}"
                    placeholder="https://safeworldtelecom.co.ke/shop"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>

        </div>
    </div>

    {{-- Ad Banner Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between pb-3 border-b mb-5">
            <h2 class="text-lg font-semibold text-gray-700">📢 Site-Wide Ad Banner</h2>
            <label class="flex items-center gap-2 cursor-pointer select-none">
                <div class="relative">
                    <input type="checkbox" name="ad_active" value="1" id="ad_active"
                        {{ ($settings['ad_active'] ?? '0') === '1' ? 'checked' : '' }}
                        class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-purple-600 transition-colors"></div>
                    <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                </div>
                <span class="text-sm font-medium text-gray-600">Show Banner</span>
            </label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Headline</label>
                <input type="text" name="ad_title" value="{{ old('ad_title', $settings['ad_title'] ?? '') }}"
                    placeholder="e.g. Flash Sale — Up to 30% Off!"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Subtitle</label>
                <input type="text" name="ad_subtitle" value="{{ old('ad_subtitle', $settings['ad_subtitle'] ?? '') }}"
                    placeholder="e.g. Limited time offer on all Samsung devices"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Button Label</label>
                <input type="text" name="ad_cta" value="{{ old('ad_cta', $settings['ad_cta'] ?? '') }}"
                    placeholder="e.g. Shop Now"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Button Link</label>
                <input type="url" name="ad_link" value="{{ old('ad_link', $settings['ad_link'] ?? '') }}"
                    placeholder="https://safeworldtelecom.co.ke/shop"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Background Colour</label>
                <div class="flex items-center gap-3">
                    <input type="color" name="ad_bg" value="{{ old('ad_bg', $settings['ad_bg'] ?? '#b5342a') }}"
                        class="h-10 w-16 cursor-pointer rounded-lg border border-gray-300 p-1">
                    <span class="text-xs text-gray-400">Pick any colour for the banner background</span>
                </div>
            </div>
            <div class="flex items-end">
                @php
                    $previewBg = $settings['ad_bg'] ?? '#b5342a';
                    $previewTitle = $settings['ad_title'] ?? 'Special Offer';
                    $previewSub = $settings['ad_subtitle'] ?? 'Explore our latest deals.';
                    $previewCta = $settings['ad_cta'] ?? 'Shop Now';
                @endphp
                <div class="w-full rounded-xl p-4 text-white text-sm" style="background-color: {{ $previewBg }}">
                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-70 mb-0.5">Preview</p>
                    <p class="font-bold">{{ $previewTitle }}</p>
                    <p class="text-white/80 text-xs">{{ $previewSub }}</p>
                    @if($previewCta)
                        <span class="inline-block mt-2 px-4 py-1 bg-white text-xs font-bold rounded-full" style="color: {{ $previewBg }}">{{ $previewCta }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="px-8 py-3 bg-purple-600 text-white rounded-xl font-semibold hover:bg-purple-700 transition shadow-lg">
            Save All Changes
        </button>
    </div>
</form>
@endsection
