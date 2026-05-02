@extends('admin.layout')

@section('page-title', 'Edit Event')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Edit: {{ $event->title }}</h2>

        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Event Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $event->title) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                <textarea name="description" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none resize-none">{{ old('description', $event->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                     class="w-48 h-32 object-cover rounded-xl mb-3 border border-gray-200">
                <label class="block text-sm font-medium text-gray-600 mb-1">Replace Image (optional)</label>
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-red-50 file:text-[#b5342a] hover:file:bg-red-100 transition">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-semibold hover:bg-[#9a2b23] transition shadow">
                    Update Event
                </button>
                <a href="{{ route('admin.events.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
