@extends('admin.layout')

@section('page-title', 'Add Product')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">New Product</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Product Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none resize-none">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Price (KES) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" value="{{ old('price') }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Original Price / Discount (KES)</label>
                    <input type="number" name="discount_price" value="{{ old('discount_price') }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Deposit Amount (KES)</label>
                    <input type="number" name="deposit_amount" value="{{ old('deposit_amount') }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Monthly Payment (KES)</label>
                    <input type="number" name="monthly_payment" value="{{ old('monthly_payment') }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Stock <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Category</label>
                    <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none bg-white">
                        <option value="">— None —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Brand</label>
                    <select name="brand_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none bg-white">
                        <option value="">— None —</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Product Image</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 transition">
                </div>

                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 text-purple-600 rounded">
                        <span class="text-sm font-medium text-gray-600">Mark as Featured Product</span>
                    </label>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Storage / RAM Variants
                        <span class="text-xs text-gray-400 font-normal ml-1">— optional, for phones with multiple storage options</span>
                    </label>
                    <div id="variants-container" class="space-y-2 mb-3">
                        @foreach(old('variant_labels', []) as $i => $label)
                        <div class="flex gap-2 items-center">
                            <input type="text" name="variant_labels[]" value="{{ $label }}" placeholder="Label (e.g. 4GB / 64GB)"
                                class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                            <input type="number" name="variant_prices[]" value="{{ old('variant_prices')[$i] ?? '' }}" placeholder="Price (KES)" min="0"
                                class="w-40 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
                            <button type="button" onclick="this.closest('div').remove()"
                                class="p-2 text-red-500 bg-red-50 rounded-lg hover:bg-red-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-variant-btn"
                        class="px-4 py-2 text-sm bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition font-medium flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Add Variant
                    </button>
                    <p class="text-xs text-gray-400 mt-2">On the product page, customers will see these as selectable buttons. Choosing one updates the displayed price automatically.</p>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-xl text-sm font-semibold hover:bg-purple-700 transition shadow">
                    Create Product
                </button>
                <a href="{{ route('admin.products.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('add-variant-btn').addEventListener('click', function () {
    const container = document.getElementById('variants-container');
    const row = document.createElement('div');
    row.className = 'flex gap-2 items-center';
    row.innerHTML = `
        <input type="text" name="variant_labels[]" placeholder="Label (e.g. 4GB / 64GB)"
            class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
        <input type="number" name="variant_prices[]" placeholder="Price (KES)" min="0"
            class="w-40 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none">
        <button type="button" onclick="this.closest('div').remove()"
            class="p-2 text-red-500 bg-red-50 rounded-lg hover:bg-red-100 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    `;
    container.appendChild(row);
    row.querySelector('input[type=text]').focus();
});
</script>
@endpush
