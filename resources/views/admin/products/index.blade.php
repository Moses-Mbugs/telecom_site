@extends('admin.layout')

@section('page-title', 'Manage Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">All Products</h2>
    <a href="{{ route('admin.products.create') }}"
       class="px-5 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-medium hover:bg-purple-700 transition shadow">
        + Add Product
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-100 text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-5 py-3 text-left font-semibold text-gray-500 uppercase tracking-wide text-xs">Product</th>
                <th class="px-5 py-3 text-left font-semibold text-gray-500 uppercase tracking-wide text-xs">Category</th>
                <th class="px-5 py-3 text-left font-semibold text-gray-500 uppercase tracking-wide text-xs">Price (KES)</th>
                <th class="px-5 py-3 text-left font-semibold text-gray-500 uppercase tracking-wide text-xs">Stock</th>
                <th class="px-5 py-3 text-left font-semibold text-gray-500 uppercase tracking-wide text-xs">Featured</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($products as $product)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-5 py-4">
                    <div class="flex items-center gap-3">
                        @if($product->image)
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                                 class="w-10 h-10 rounded-lg object-cover flex-shrink-0" alt="{{ $product->name }}">
                        @else
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-800">{{ $product->name }}</p>
                            <p class="text-xs text-gray-400">{{ $product->brand->name ?? '—' }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-4 text-gray-500">{{ $product->category->name ?? '—' }}</td>
                <td class="px-5 py-4 font-medium text-gray-800">{{ number_format($product->price) }}</td>
                <td class="px-5 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $product->stock > 0 ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-600' }}">
                        {{ $product->stock }}
                    </span>
                </td>
                <td class="px-5 py-4">
                    @if($product->is_featured)
                        <span class="px-2 py-1 bg-yellow-50 text-yellow-700 rounded-full text-xs font-medium">⭐ Yes</span>
                    @else
                        <span class="text-gray-400 text-xs">No</span>
                    @endif
                </td>
                <td class="px-5 py-4 text-right">
                    <div class="flex gap-2 justify-end">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="px-3 py-1.5 text-xs bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 text-xs bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-5 py-10 text-center text-gray-400">
                    No products found. <a href="{{ route('admin.products.create') }}" class="text-purple-600 hover:underline">Add the first one.</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($products->hasPages())
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endif
@endsection
