@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-16">

    {{-- Hero --}}
    <div class="text-center mb-16">
        <span class="inline-block px-4 py-1.5 bg-[#b5342a]/10 text-[#b5342a] text-sm font-bold rounded-full uppercase tracking-widest mb-4">Join Us</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#1e3040] mb-4">Careers at Safe World Telecom</h1>
        <p class="text-xl text-gray-500 max-w-2xl mx-auto">Be part of a team that is connecting Kenya and beyond. We are growing fast and looking for talented people.</p>
    </div>

    {{-- Why Work With Us --}}
    @php
    $perks = [
        [
            'svg'   => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
            'title' => 'Growth Opportunities',
            'text'  => 'We invest in our people. Clear career paths, regular training, and real chances to grow within the organisation.',
        ],
        [
            'svg'   => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
            'title' => 'Inclusive Culture',
            'text'  => 'A diverse, welcoming environment where every voice matters and ideas are heard at every level.',
        ],
        [
            'svg'   => '<svg class="w-7 h-7 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>',
            'title' => 'Innovate Daily',
            'text'  => 'Work on meaningful problems in the telecom and technology space. Your work has real impact on thousands of customers.',
        ],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        @foreach($perks as $perk)
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm text-center">
            <div class="w-14 h-14 bg-[#b5342a]/10 rounded-xl flex items-center justify-center mb-4 mx-auto">
                {!! $perk['svg'] !!}
            </div>
            <h3 class="font-bold text-[#1e3040] text-lg mb-2">{{ $perk['title'] }}</h3>
            <p class="text-gray-500 text-sm">{{ $perk['text'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Job Listings --}}
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-[#1e3040] mb-8">Open Positions</h2>

        @if($careers->isEmpty())
            <div class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-16 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No openings right now</h3>
                <p class="text-gray-400">Check back soon — we are always growing. You can also send your CV to <strong>careers@safeworldtelecom.co.ke</strong></p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($careers as $career)
                <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:border-[#b5342a] hover:shadow-md transition-all duration-300">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <h3 class="text-xl font-bold text-[#1e3040]">{{ $career->title }}</h3>
                                <span class="px-3 py-0.5 bg-green-100 text-green-700 text-xs font-bold rounded-full">Open</span>
                            </div>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $career->description }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="mailto:careers@safeworldtelecom.co.ke?subject=Application: {{ urlencode($career->title) }}"
                               class="inline-block px-6 py-2.5 bg-[#b5342a] text-white font-semibold rounded-xl hover:bg-[#9a2b23] transition-colors text-sm">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- General Application CTA --}}
    <div class="bg-[#1e3040] rounded-3xl p-10 text-center text-white">
        <h2 class="text-2xl font-bold mb-3">Don't see a fit? We still want to hear from you.</h2>
        <p class="text-gray-300 mb-6">Send your CV and a short note about what role you are interested in and we will keep you in mind for future openings.</p>
        <a href="mailto:careers@safeworldtelecom.co.ke"
           class="inline-block px-8 py-3 bg-[#b5342a] text-white font-bold rounded-full hover:scale-105 transition-transform">
            Send CV to careers@safeworldtelecom.co.ke
        </a>
    </div>
</div>

@endsection
