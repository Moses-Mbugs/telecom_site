@extends('admin.layout')

@section('page-title', 'Manage Events')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">All Events</h2>
    <a href="{{ route('admin.events.create') }}"
       class="px-5 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-medium hover:bg-[#9a2b23] transition shadow">
        + Add Event
    </a>
</div>

@if($events->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No events yet. <a href="{{ route('admin.events.create') }}" class="text-[#b5342a] hover:underline">Add the first one.</a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
        @foreach($events as $event)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                 class="w-full h-44 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 text-sm mb-1">{{ $event->title }}</h3>
                @if($event->description)
                    <p class="text-gray-500 text-xs mb-3">{{ Str::limit($event->description, 80) }}</p>
                @endif
                <p class="text-xs text-gray-400 mb-3">{{ $event->created_at->format('d M Y') }}</p>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <a href="{{ route('admin.events.edit', $event) }}"
                       class="flex-1 text-center py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Delete this event?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
