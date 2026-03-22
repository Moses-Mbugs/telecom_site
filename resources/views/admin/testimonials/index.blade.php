@extends('admin.layout')

@section('page-title', 'Manage Testimonials')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">All Testimonials</h2>
    <a href="{{ route('admin.testimonials.create') }}"
       class="px-5 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-medium hover:bg-purple-700 transition shadow">
        + Add Testimonial
    </a>
</div>

@if($testimonials->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No testimonials yet. <a href="{{ route('admin.testimonials.create') }}" class="text-purple-600 hover:underline">Add the first one.</a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
        @foreach($testimonials as $testimonial)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col">
            <div class="flex items-center gap-3 mb-3">
                @if($testimonial->image_url)
                    <img src="{{ Str::startsWith($testimonial->image_url, 'http') ? $testimonial->image_url : asset('storage/' . $testimonial->image_url) }}"
                         class="w-10 h-10 rounded-full object-cover" alt="{{ $testimonial->client_name }}">
                @else
                    <div class="w-10 h-10 rounded-full bg-purple-200 text-purple-700 flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <p class="font-semibold text-gray-800 text-sm">{{ $testimonial->client_name }}</p>
                    <p class="text-yellow-400 text-xs">{{ str_repeat('★', $testimonial->rating) }}</p>
                </div>
            </div>
            <p class="text-gray-500 text-sm italic flex-1">"{{ Str::limit($testimonial->content, 100) }}"</p>
            <div class="flex gap-2 mt-4 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                   class="flex-1 text-center py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="flex-1 px-4 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
