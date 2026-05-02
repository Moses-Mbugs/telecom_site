@extends('admin.layout')

@section('page-title', 'Edit Career Listing')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Edit: {{ $career->title }}</h2>

        <form action="{{ route('admin.careers.update', $career) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Job Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $career->title) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="6" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none resize-none">{{ old('description', $career->description) }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    {{ old('is_active', $career->is_active ? '1' : '0') == '1' ? 'checked' : '' }}
                    class="w-4 h-4 accent-[#b5342a]">
                <label for="is_active" class="text-sm font-medium text-gray-600">Active (visible on public careers page)</label>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-semibold hover:bg-[#9a2b23] transition shadow">
                    Update Position
                </button>
                <a href="{{ route('admin.careers.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
