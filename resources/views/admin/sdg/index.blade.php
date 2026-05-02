@extends('admin.layout')

@section('page-title', 'Manage SDG Items')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-700">SDG Commitments</h2>
    <a href="{{ route('admin.sdg.create') }}"
       class="px-5 py-2.5 bg-[#b5342a] text-white rounded-xl text-sm font-medium hover:bg-[#9a2b23] transition shadow">
        + Add SDG Item
    </a>
</div>

@if($sdgItems->isEmpty())
    <div class="bg-white rounded-2xl p-10 text-center text-gray-400 border border-dashed border-gray-200">
        No SDG items yet. <a href="{{ route('admin.sdg.create') }}" class="text-[#b5342a] hover:underline">Add the first one.</a>
    </div>
@else
    <div class="space-y-4">
        @foreach($sdgItems as $item)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-4 flex-1">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-black text-lg flex-shrink-0"
                         style="background-color: {{ ['#E5243B','#DDA63A','#4C9F38','#C5192D','#FF3A21','#26BDE2','#FCC30B','#A21942','#FD6925','#DD1367','#FD9D24','#BF8B2E','#3F7E44','#0A97D9','#56C02B','#00689D','#19486A'][$item->sdg_number - 1] ?? '#1e3040' }}">
                        {{ $item->sdg_number }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">SDG {{ $item->sdg_number }}: {{ $item->title }}</h3>
                        <p class="text-gray-500 text-sm">{{ Str::limit($item->description, 120) }}</p>
                    </div>
                </div>
                <div class="flex gap-2 flex-shrink-0">
                    <a href="{{ route('admin.sdg.edit', $item) }}"
                       class="px-4 py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition font-medium">Edit</a>
                    <form action="{{ route('admin.sdg.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this SDG item?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-1.5 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
