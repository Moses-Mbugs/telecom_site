@extends('admin.layout')

@section('page-title', 'Add Testimonial')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">New Testimonial</h2>

        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Client Name <span class="text-red-500">*</span></label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Review Content <span class="text-red-500">*</span></label>
                <textarea name="content" rows="4" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('content') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Rating <span class="text-red-500">*</span></label>
                <select name="rating"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none bg-white">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Client Photo (optional)</label>
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-semibold hover:bg-purple-700 transition shadow">
                    Save Testimonial
                </button>
                <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
