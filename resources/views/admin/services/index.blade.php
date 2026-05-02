@extends('admin.layout')

@section('page-title', 'Manage Services')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">All Services</h2>
    <a href="{{ route('admin.services.create') }}"
       class="px-5 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-medium hover:bg-[#9a2b23] transition shadow">
        + Add Service
    </a>
</div>

@if($services->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No services yet. <a href="{{ route('admin.services.create') }}" class="text-[#b5342a] hover:underline">Add the first one.</a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
        @foreach($services as $service)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-start gap-3 mb-3">
                @if($service->icon)
                    <span class="text-3xl">{{ $service->icon }}</span>
                @endif
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <h3 class="font-semibold text-gray-800 text-sm">{{ $service->title }}</h3>
                        @if($service->is_active)
                            <span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-bold rounded-full">Active</span>
                        @else
                            <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs font-bold rounded-full">Hidden</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400 mt-0.5">Sort order: {{ $service->sort_order }}</p>
                </div>
            </div>
            <p class="text-gray-500 text-xs mb-4">{{ Str::limit($service->description, 100) }}</p>
            <div class="flex gap-2 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.services.edit', $service) }}"
                   class="flex-1 text-center py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
