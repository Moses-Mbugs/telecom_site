@extends('admin.layout')

@section('page-title', 'Manage Categories')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">Add Category</a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 text-gray-500 text-sm border-b">
                <th class="py-3 px-6 font-medium">Image</th>
                <th class="py-3 px-6 font-medium">Name</th>
                <th class="py-3 px-6 font-medium">Slug</th>
                <th class="py-3 px-6 font-medium text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($categories as $category)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-6">
                        @if($category->image)
                            <img src="{{ str_starts_with($category->image, 'http') ? $category->image : asset('storage/' . $category->image) }}" class="w-12 h-12 rounded-lg object-cover" alt="Image">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-400">None</div>
                        @endif
                    </td>
                    <td class="py-3 px-6 font-medium text-gray-800">{{ $category->name }}</td>
                    <td class="py-3 px-6 text-gray-600 text-sm">{{ $category->slug }}</td>
                    <td class="py-3 px-6 text-right space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this category?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-8 text-center text-gray-500">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

