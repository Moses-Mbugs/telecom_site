@extends('admin.layout')

@section('page-title', 'Edit Location')

@section('content')
<div class="mb-6 flex items-center gap-4">
    <a href="{{ route('admin.locations.index') }}" class="text-gray-500 hover:text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <h2 class="text-2xl font-bold text-gray-800">Edit Location: {{ $location->name }}</h2>
</div>

<form action="{{ route('admin.locations.update', $location) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    @csrf @method('PUT')
    
    <div class="space-y-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
            <input type="text" name="name" value="{{ old('name', $location->name) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
            <input type="text" name="address" value="{{ old('address', $location->address) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $location->phone) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Google Maps URL</label>
            <textarea name="map_embed_url" rows="3" placeholder="Paste any Google Maps link — share link, short link, or embed URL" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-400 focus:border-transparent outline-none resize-none">{{ old('map_embed_url', $location->map_embed_url) }}</textarea>
            <p class="text-xs text-gray-400 mt-1">Paste any Google Maps link (including <span class="font-medium text-gray-600">maps.app.goo.gl</span> short links) — it will be converted to an embed URL automatically.</p>
            @error('map_embed_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Store Image</label>
            @if($location->asset_url)
                <div class="mb-3">
                    <img src="{{ $location->asset_url }}" class="h-32 rounded-lg object-cover" alt="Current image">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-8 flex justify-end">
        <button type="submit" class="bg-purple-600 text-white font-medium px-6 py-2.5 rounded-lg hover:bg-purple-700 transition">Update Location</button>
    </div>
</form>
@endsection
