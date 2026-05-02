@extends('admin.layout')

@section('page-title', 'Service Enquiries')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">Service Enquiries</h2>
    <span class="px-4 py-2 bg-gray-100 text-gray-600 rounded-xl text-sm font-medium">{{ $enquiries->count() }} total</span>
</div>

@if($enquiries->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No service enquiries yet. They will appear here once customers submit the form on the Services page.
    </div>
@else
    <div class="space-y-4">
        @foreach($enquiries as $enquiry)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-start justify-between gap-4">
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-3">
                        <h3 class="font-semibold text-gray-800">{{ $enquiry->name }}</h3>
                        @if($enquiry->service_interest)
                            <span class="px-2.5 py-0.5 bg-red-50 text-[#b5342a] text-xs font-medium rounded-full">{{ $enquiry->service_interest }}</span>
                        @endif
                        <a href="mailto:{{ $enquiry->email }}"
                           class="px-2.5 py-0.5 bg-blue-50 text-blue-700 text-xs font-medium rounded-full hover:bg-blue-100 transition">
                            {{ $enquiry->email }}
                        </a>
                        @if($enquiry->phone)
                            <a href="tel:{{ $enquiry->phone }}"
                               class="px-2.5 py-0.5 bg-green-50 text-green-700 text-xs font-medium rounded-full hover:bg-green-100 transition">
                                {{ $enquiry->phone }}
                            </a>
                        @endif
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed bg-gray-50 p-4 rounded-xl">{{ $enquiry->message }}</p>
                    <p class="text-xs text-gray-400 mt-3">Received {{ $enquiry->created_at->diffForHumans() }} &middot; {{ $enquiry->created_at->format('d M Y, H:i') }}</p>
                </div>
                <form action="{{ route('admin.service-enquiries.destroy', $enquiry) }}" method="POST"
                    onsubmit="return confirm('Delete this enquiry?')" class="flex-shrink-0">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
