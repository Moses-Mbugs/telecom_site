@extends('admin.layout')

@section('page-title', 'Edit SDG Item')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Edit SDG {{ $sdg->sdg_number }}: {{ $sdg->title }}</h2>

        <form action="{{ route('admin.sdg.update', $sdg) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">SDG Number (1–17) <span class="text-red-500">*</span></label>
                <select name="sdg_number" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none bg-white">
                    @foreach(range(1,17) as $n)
                        <option value="{{ $n }}" {{ old('sdg_number', $sdg->sdg_number) == $n ? 'selected' : '' }}>SDG {{ $n }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $sdg->title) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">SDG Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="3" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none resize-none">{{ old('description', $sdg->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Our Company Contribution <span class="text-red-500">*</span></label>
                <textarea name="company_contribution" rows="4" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#b5342a] focus:border-transparent outline-none resize-none">{{ old('company_contribution', $sdg->company_contribution) }}</textarea>
            </div>

            @if($sdg->image)
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $sdg->image) }}" alt="SDG {{ $sdg->sdg_number }}"
                     class="w-32 h-32 object-contain rounded-xl mb-2 border border-gray-200 p-2">
            </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">{{ $sdg->image ? 'Replace Image (optional)' : 'Image (optional)' }}</label>
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-red-50 file:text-[#b5342a] hover:file:bg-red-100 transition">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-semibold hover:bg-[#9a2b23] transition shadow">
                    Update SDG Item
                </button>
                <a href="{{ route('admin.sdg.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
