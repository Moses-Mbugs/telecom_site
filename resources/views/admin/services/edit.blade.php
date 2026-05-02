@extends('admin.layout')

@section('page-title', 'Edit Service')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Edit: {{ $service->title }}</h2>

        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Service Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="5" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none resize-none">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Icon (emoji)</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" maxlength="10"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    {{ old('is_active', $service->is_active ? '1' : '0') == '1' ? 'checked' : '' }}
                    class="w-4 h-4 accent-[#b5342a]">
                <label for="is_active" class="text-sm font-medium text-gray-600">Active (visible on public services page)</label>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-semibold hover:bg-[#9a2b23] transition shadow">
                    Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
