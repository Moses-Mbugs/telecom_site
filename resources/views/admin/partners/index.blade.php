@extends('admin.layout')

@section('page-title', 'Manage Partners')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">Our Partners</h2>
    <a href="{{ route('admin.partners.create') }}"
       class="px-5 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-medium hover:bg-[#9a2b23] transition shadow">
        + Add Partner
    </a>
</div>

@if($partners->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No partners yet. <a href="{{ route('admin.partners.create') }}" class="text-[#b5342a] hover:underline">Add the first one.</a>
    </div>
@else
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
        @foreach($partners as $partner)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col items-center">
            <div class="w-full h-20 flex items-center justify-center mb-3">
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                     class="max-h-16 max-w-full object-contain {{ !$partner->is_active ? 'opacity-40 grayscale' : '' }}">
            </div>
            <p class="font-semibold text-gray-700 text-sm text-center mb-1">{{ $partner->name }}</p>
            @if(!$partner->is_active)
                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs font-bold rounded-full mb-2">Hidden</span>
            @else
                <span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-bold rounded-full mb-2">Active</span>
            @endif
            <div class="flex gap-2 mt-auto pt-3 border-t border-gray-100 w-full">
                <a href="{{ route('admin.partners.edit', $partner) }}"
                   class="flex-1 text-center py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Remove this partner?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Remove</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
