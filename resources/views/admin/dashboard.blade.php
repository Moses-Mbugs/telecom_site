@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Products</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['products'] }}</p>
            </div>
        </div>
        <a href="{{ route('admin.products.index') }}" class="mt-4 inline-block text-sm text-purple-600 hover:underline">Manage Products →</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Testimonials</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['testimonials'] }}</p>
            </div>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="mt-4 inline-block text-sm text-blue-600 hover:underline">Manage Testimonials →</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Homepage Settings</p>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['settings'] }}</p>
            </div>
        </div>
        <a href="{{ route('admin.homepage.index') }}" class="mt-4 inline-block text-sm text-green-600 hover:underline">Manage Homepage →</a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Quick Actions</h2>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg text-sm font-medium hover:bg-purple-700 transition">
            + Add Product
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">
            + Add Testimonial
        </a>
        <a href="{{ route('admin.homepage.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition">
            ✎ Edit Homepage
        </a>
        <a href="{{ url('/') }}" target="_blank" class="px-4 py-2 bg-gray-600 text-white rounded-lg text-sm font-medium hover:bg-gray-700 transition">
            👁 View Site
        </a>
    </div>
</div>
@endsection
