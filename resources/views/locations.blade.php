@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Our Locations</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Visit us at one of our convenient locations across the country.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($locations as $location)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
            <div class="h-48 bg-gray-200 relative">
                <img src="{{ $location->image_url ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $location->name }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                    <h3 class="text-white text-2xl font-bold">{{ $location->name }}</h3>
                </div>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4 flex items-start gap-3">
                    <svg class="w-5 h-5 text-purple-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>{!! nl2br(e($location->address)) !!}</span>
                </p>
                <p class="text-gray-600 mb-4 flex items-center gap-3">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    {{ $location->phone }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
