@extends('admin.layout')

@section('page-title', 'Edit Partner')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Edit: {{ $partner->name }}</h2>

        <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Partner Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $partner->name) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">Current Logo</label>
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-center mb-3 border border-gray-200">
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                         class="max-h-16 max-w-full object-contain">
                </div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Replace Logo (optional)</label>
                <input type="file" name="logo" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-red-50 file:text-[#b5342a] hover:file:bg-red-100 transition">
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    {{ old('is_active', $partner->is_active ? '1' : '0') == '1' ? 'checked' : '' }}
                    class="w-4 h-4 accent-[#b5342a]">
                <label for="is_active" class="text-sm font-medium text-gray-600">Active (show on homepage)</label>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-semibold hover:bg-[#9a2b23] transition shadow">
                    Update Partner
                </button>
                <a href="{{ route('admin.partners.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
