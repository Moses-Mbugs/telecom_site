@extends('layouts.app')

@php
$sdgColors = [
    1  => '#E5243B', 2  => '#DDA63A', 3  => '#4C9F38', 4  => '#C5192D',
    5  => '#FF3A21', 6  => '#26BDE2', 7  => '#FCC30B', 8  => '#A21942',
    9  => '#FD6925', 10 => '#DD1367', 11 => '#FD9D24', 12 => '#BF8B2E',
    13 => '#3F7E44', 14 => '#0A97D9', 15 => '#56C02B', 16 => '#00689D',
    17 => '#19486A',
];
@endphp

@section('content')

@include('partials.ad-banner')

<div class="max-w-7xl mx-auto px-6 py-16">

    {{-- Hero --}}
    <div class="text-center mb-6">
        <span class="inline-block px-4 py-1.5 bg-[#b5342a]/10 text-[#b5342a] text-sm font-bold rounded-full uppercase tracking-widest mb-4">Responsibility</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#1e3040] mb-4">Sustainable Development Goals</h1>
        <p class="text-xl text-gray-500 max-w-3xl mx-auto">Safe World Telecom is committed to the United Nations 2030 Agenda. We align our business with the SDGs to create positive impact for people and the planet.</p>
    </div>

    {{-- UN SDG badge --}}
    <div class="flex justify-center mb-16">
        <div class="inline-flex items-center gap-3 bg-[#1e3040] text-white px-6 py-3 rounded-full">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="text-sm font-bold tracking-wide">Aligned with the UN 2030 Sustainable Development Goals</span>
        </div>
    </div>

    @if($sdgItems->isEmpty())
        {{-- Default SDG content --}}
        @php
        $defaultSdgs = [
            ['number' => 4,  'title' => 'Quality Education', 'description' => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all.', 'contribution' => 'We run digital literacy programmes in underserved communities and partner with schools to provide affordable devices, ensuring students have the tools they need to access education online.'],
            ['number' => 8,  'title' => 'Decent Work & Economic Growth', 'description' => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all.', 'contribution' => 'We directly employ hundreds of Kenyans across our 19 outlets nationwide, prioritise local hiring, and offer instalment plans that enable micro-entrepreneurs to access business-critical technology.'],
            ['number' => 9,  'title' => 'Industry, Innovation & Infrastructure', 'description' => 'Build resilient infrastructure, promote inclusive and sustainable industrialisation and foster innovation.', 'contribution' => 'Through M-Pesa integration services and mobile connectivity solutions, we help businesses build digital infrastructure, enabling them to compete and grow in a connected economy.'],
            ['number' => 10, 'title' => 'Reduced Inequalities', 'description' => 'Reduce inequality within and among countries.', 'contribution' => 'Our flexible instalment and financing plans make smartphones and technology accessible to people across all income levels, reducing the digital divide between urban and rural Kenya.'],
            ['number' => 17, 'title' => 'Partnerships for the Goals', 'description' => 'Strengthen the means of implementation and revitalise the global partnership for sustainable development.', 'contribution' => 'We partner with telecom giants, NGOs, and local businesses to extend the reach of connectivity solutions to communities that need them most, contributing to a broader ecosystem of shared growth.'],
        ];
        @endphp
        <div class="space-y-8">
            @foreach($defaultSdgs as $sdg)
            @php $color = $sdgColors[$sdg['number']] ?? '#1e3040'; @endphp
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex flex-col md:flex-row">
                    {{-- SDG Number Badge --}}
                    <div class="md:w-48 flex-shrink-0 flex items-center justify-center p-8 text-white" style="background-color: {{ $color }}">
                        <div class="text-center">
                            <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-1">SDG</p>
                            <p class="text-6xl font-black leading-none">{{ $sdg['number'] }}</p>
                        </div>
                    </div>
                    {{-- Content --}}
                    <div class="flex-1 p-8">
                        <h3 class="text-2xl font-bold text-[#1e3040] mb-3">{{ $sdg['title'] }}</h3>
                        <p class="text-gray-400 text-sm italic mb-4 border-l-4 pl-4" style="border-color: {{ $color }}">{{ $sdg['description'] }}</p>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color: {{ $color }}">Our Contribution</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $sdg['contribution'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="space-y-8">
            @foreach($sdgItems as $item)
            @php $color = $sdgColors[$item->sdg_number] ?? '#1e3040'; @endphp
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex flex-col md:flex-row">
                    {{-- SDG Number Badge --}}
                    <div class="md:w-48 flex-shrink-0 flex items-center justify-center p-8 text-white" style="background-color: {{ $color }}">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="SDG {{ $item->sdg_number }}" class="w-full max-w-[100px] mx-auto">
                        @else
                            <div class="text-center">
                                <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-1">SDG</p>
                                <p class="text-6xl font-black leading-none">{{ $item->sdg_number }}</p>
                            </div>
                        @endif
                    </div>
                    {{-- Content --}}
                    <div class="flex-1 p-8">
                        <h3 class="text-2xl font-bold text-[#1e3040] mb-3">{{ $item->title }}</h3>
                        <p class="text-gray-400 text-sm italic mb-4 border-l-4 pl-4" style="border-color: {{ $color }}">{{ $item->description }}</p>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color: {{ $color }}">Our Contribution</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $item->company_contribution }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    {{-- Commitment statement --}}
    <div class="mt-16 bg-gradient-to-br from-[#1e3040] via-[#2a4560] to-[#1e3040] rounded-3xl p-10 text-center text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-[#b5342a] rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-[#7a7a6a] rounded-full filter blur-3xl"></div>
        </div>
        <div class="relative z-10">
            <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h2 class="text-3xl font-bold mb-4">Our Commitment to a Better World</h2>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed">
                We believe that business growth and social responsibility go hand in hand. Every device we sell, every connection we enable, and every job we create is a step toward the world the SDGs envision.
            </p>
        </div>
    </div>
</div>

@endsection
