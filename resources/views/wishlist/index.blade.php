@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">My Wishlist</h1>
        <a href="{{ route('shop') }}" class="text-purple-600 hover:text-purple-800 font-medium flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Continue Shopping
        </a>
    </div>

    @if($wishlist->isEmpty())
        <div class="bg-white rounded-2xl shadow-sm p-12 text-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Your wishlist is empty</h2>
            <p class="text-gray-500 mb-8">Save items you love to your wishlist.</p>
            <a href="{{ route('shop') }}" class="inline-block bg-purple-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-purple-700 transition shadow-lg hover:shadow-purple-500/30">
                Start Shopping
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($wishlist as $item)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition group relative">
                    <button onclick="removeFromWishlist({{ $item->product->id }}, this)" class="absolute top-3 right-3 bg-white p-2 rounded-full text-red-500 shadow-sm hover:bg-red-50 transition z-10" title="Remove">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                    
                    <a href="{{ route('product.show', $item->product->slug) }}" class="block relative h-48 bg-gray-50 p-6 flex items-center justify-center">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="max-w-full max-h-full object-contain group-hover:scale-110 transition duration-500">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </a>
                    
                    <div class="p-5">
                        <h3 class="font-bold text-gray-800 text-lg mb-1 truncate">{{ $item->product->name }}</h3>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="font-bold text-purple-600">KES {{ number_format($item->product->price) }}</span>
                        </div>
                        
                        <form action="{{ route('cart.add', $item->product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-gray-900 text-white py-2.5 rounded-xl text-sm font-bold hover:bg-purple-600 transition flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@push('scripts')
<script>
    function removeFromWishlist(productId, btn) {
        if(!confirm('Are you sure you want to remove this item from your wishlist?')) return;
        
        fetch(`/wishlist/toggle/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.added) {
                // Animate removal
                const card = btn.closest('.group');
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    card.remove();
                    // Reload if empty to show empty state
                    if(document.querySelectorAll('.group').length === 0) {
                        location.reload();
                    }
                }, 300);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endpush
@endsection
