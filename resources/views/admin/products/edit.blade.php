@extends('admin.layout')

@section('page-title', 'Edit Product')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Edit: {{ $product->name }}</h2>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Product Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Price (KES) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Original Price / Discount (KES)</label>
                    <input type="number" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Deposit Amount (KES)</label>
                    <input type="number" name="deposit_amount" value="{{ old('deposit_amount', $product->deposit_amount) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Monthly Payment (KES)</label>
                    <input type="number" name="monthly_payment" value="{{ old('monthly_payment', $product->monthly_payment) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Stock <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Category</label>
                    <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none bg-white">
                        <option value="">— None —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Brand</label>
                    <select name="brand_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none bg-white">
                        <option value="">— None —</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Product Image</label>
                    @if($product->image)
                        <div class="mb-2">
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                                 class="h-20 w-20 rounded-lg object-cover" alt="{{ $product->name }}">
                            <p class="text-xs text-gray-400 mt-1">Upload a new image to replace.</p>
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                            class="w-4 h-4 text-purple-600 rounded">
                        <span class="text-sm font-medium text-gray-600">Mark as Featured Product</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-semibold hover:bg-purple-700 transition shadow">
                    Update Product
                </button>
                <a href="{{ route('admin.products.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
