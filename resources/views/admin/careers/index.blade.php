@extends('admin.layout')

@section('page-title', 'Manage Careers')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">All Career Listings</h2>
    <a href="{{ route('admin.careers.create') }}"
       class="px-5 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-medium hover:bg-[#9a2b23] transition shadow">
        + Add Position
    </a>
</div>

@if($careers->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No career listings yet. <a href="{{ route('admin.careers.create') }}" class="text-[#b5342a] hover:underline">Add the first one.</a>
    </div>
@else
    <div class="space-y-4">
        @foreach($careers as $career)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-start justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="font-semibold text-gray-800">{{ $career->title }}</h3>
                        @if($career->is_active)
                            <span class="px-2.5 py-0.5 bg-green-100 text-green-700 text-xs font-bold rounded-full">Active</span>
                        @else
                            <span class="px-2.5 py-0.5 bg-gray-100 text-gray-500 text-xs font-bold rounded-full">Inactive</span>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm">{{ Str::limit($career->description, 150) }}</p>
                    <p class="text-xs text-gray-400 mt-2">Added {{ $career->created_at->diffForHumans() }}</p>
                </div>
                <div class="flex gap-2 flex-shrink-0">
                    <a href="{{ route('admin.careers.edit', $career) }}"
                       class="px-4 py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                    <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" onsubmit="return confirm('Delete this career listing?')">
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
