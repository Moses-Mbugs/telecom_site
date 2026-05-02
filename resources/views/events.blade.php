@extends('layouts.app')

@section('content')

@include('partials.ad-banner')

<div class="max-w-7xl mx-auto px-6 py-16">

    {{-- Hero --}}
    <div class="text-center mb-16">
        <span class="inline-block px-4 py-1.5 bg-[#b5342a]/10 text-[#b5342a] text-sm font-bold rounded-full uppercase tracking-widest mb-4">Our Story</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#1e3040] mb-4">Our Events</h1>
        <p class="text-xl text-gray-500 max-w-2xl mx-auto">A glimpse into the milestones, activations, and community moments that define Safe World Telecom.</p>
    </div>

    @if($events->isEmpty())
        <div class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-20 text-center">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-500">Events coming soon</h3>
            <p class="text-gray-400 mt-2">Check back to see our latest activations and community highlights.</p>
        </div>
    @else
        {{-- Masonry-style gallery --}}
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @foreach($events as $event)
            <div class="break-inside-avoid bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group border border-gray-100">
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/' . $event->image) }}"
                         alt="{{ $event->title }}"
                         class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-[#1e3040] text-base mb-1">{{ $event->title }}</h3>
                    @if($event->description)
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $event->description }}</p>
                    @endif
                    <p class="text-xs text-gray-300 mt-3">{{ $event->created_at->format('d M Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
