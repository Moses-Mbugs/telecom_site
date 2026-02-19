@extends('layouts.app')

@section('title', 'About Us | Safe World Telecom')

@push('styles')
<style>
    .pattern-grid {
        background-image: radial-gradient(#4f46e5 1px, transparent 1px);
        background-size: 20px 20px;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 text-gray-800">

    {{-- 1. Hero Section --}}
    <section class="relative py-24 bg-primary overflow-hidden">
        <div class="absolute inset-0 pattern-grid opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-primary via-slate-900 to-purple-900 opacity-90"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-white/10 text-white text-sm font-semibold mb-6 backdrop-blur-sm border border-white/20">
                Since 2007
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
                Connecting Kenya to the <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Future</span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                We are a premier telecommunications provider, dedicated to bridging the digital divide with innovative solutions, reliable connectivity, and trusted partnerships.
            </p>
        </div>
    </section>

    {{-- 2. Who We Are & Stats --}}
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Who We Are</h2>
                    <div class="w-20 h-1.5 bg-purple-600 rounded-full mb-8"></div>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Safe World Telecom Limited is a Kenyan-based telecommunications company established in 2007. As an authorized Safaricom Dealer and M-Pesa Agent, we have grown from a single outlet to a nationwide network.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed mb-8">
                        We specialize in the distribution of mobile devices, accessories, and enterprise solutions. Our commitment to excellence has positioned us as a leader in the industry, serving thousands of happy customers daily.
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-6 bg-white rounded-2xl shadow-lg border-l-4 border-purple-600">
                            <span class="block text-4xl font-bold text-gray-900 mb-1">19+</span>
                            <span class="text-sm text-gray-500 uppercase tracking-wide">Retail Outlets</span>
                        </div>
                        <div class="p-6 bg-white rounded-2xl shadow-lg border-l-4 border-blue-600">
                            <span class="block text-4xl font-bold text-gray-900 mb-1">800+</span>
                            <span class="text-sm text-gray-500 uppercase tracking-wide">Sub Agencies</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-purple-600 to-blue-600 rounded-3xl transform rotate-3 opacity-20"></div>
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Our Team" class="relative rounded-3xl shadow-2xl object-cover h-[500px] w-full">
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Vision & Mission --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-10">
                {{-- Vision --}}
                <div class="group p-10 rounded-3xl bg-gray-50 hover:bg-purple-600 hover:text-white transition-all duration-500 shadow-xl">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-purple-600 text-3xl mb-6 shadow-md group-hover:scale-110 transition-transform">
                        👁️
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                    <p class="text-gray-600 group-hover:text-purple-100 text-lg leading-relaxed">
                        "To be the leading and most referred communication solution provider in Kenya and the East African region."
                    </p>
                </div>

                {{-- Mission --}}
                <div class="group p-10 rounded-3xl bg-gray-50 hover:bg-blue-600 hover:text-white transition-all duration-500 shadow-xl">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-blue-600 text-3xl mb-6 shadow-md group-hover:scale-110 transition-transform">
                        🚀
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="text-gray-600 group-hover:text-blue-100 text-lg leading-relaxed">
                        "To be the best and most successful distributor of telecommunication products and services, offering communication solutions that meet our customers' needs."
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Core Values --}}
    <section class="py-24 bg-gray-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 pattern-grid opacity-5"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Core Values</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">The principles that guide our every action and decision.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach([
                    ['icon' => '💎', 'title' => 'Integrity', 'desc' => 'Honesty in all we do'],
                    ['icon' => '⭐', 'title' => 'Quality', 'desc' => 'Excellence in service'],
                    ['icon' => '💡', 'title' => 'Creativity', 'desc' => 'Innovation driven'],
                    ['icon' => '🎯', 'title' => 'Competence', 'desc' => 'Expert knowledge'],
                    ['icon' => '🤝', 'title' => 'Team Spirit', 'desc' => 'Growing together']
                ] as $value)
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-6 rounded-2xl text-center hover:bg-white/10 transition duration-300">
                    <div class="text-4xl mb-4">{{ $value['icon'] }}</div>
                    <h3 class="text-xl font-bold mb-2">{{ $value['title'] }}</h3>
                    <p class="text-sm text-gray-400">{{ $value['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Leadership --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Meet Our Leadership</h2>
                <p class="text-gray-500">The visionaries driving our success.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 max-w-4xl mx-auto">
                {{-- Leader 1 --}}
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden group">
                    <div class="h-32 bg-gradient-to-r from-purple-600 to-indigo-600"></div>
                    <div class="px-8 pb-8 -mt-16 relative">
                        <div class="w-32 h-32 rounded-full border-4 border-white bg-gray-200 mx-auto overflow-hidden shadow-lg">
                            <img src="https://ui-avatars.com/api/?name=Justus+Kimosop&background=random&size=128" alt="Justus Kimosop" class="w-full h-full object-cover">
                        </div>
                        <div class="text-center mt-6">
                            <h3 class="text-2xl font-bold text-gray-900">Mr. Justus Kimosop</h3>
                            <p class="text-purple-600 font-medium mb-4">Executive Director</p>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                A veteran in the GSM sector since 1999. His strategic leadership has kept Safe World Telecom among the top-performing Safaricom dealers for over a decade.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Leader 2 --}}
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden group">
                    <div class="h-32 bg-gradient-to-r from-blue-600 to-teal-600"></div>
                    <div class="px-8 pb-8 -mt-16 relative">
                        <div class="w-32 h-32 rounded-full border-4 border-white bg-gray-200 mx-auto overflow-hidden shadow-lg">
                            <img src="https://ui-avatars.com/api/?name=Caroline+Kiprop&background=random&size=128" alt="Caroline Kiprop" class="w-full h-full object-cover">
                        </div>
                        <div class="text-center mt-6">
                            <h3 class="text-2xl font-bold text-gray-900">Mrs. Caroline Kiprop</h3>
                            <p class="text-blue-600 font-medium mb-4">Director & General Manager</p>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                With industry experience since 2002, she excels in operations, HR, and building strong client relationships, ensuring seamless service delivery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 6. Call to Action --}}
    <section class="py-20 bg-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-8">Ready to Transform Your Connectivity?</h2>
            <p class="text-xl text-gray-200 mb-10 max-w-2xl mx-auto">
                Join the Safe World family today and experience world-class telecom services.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('shop') }}" target="_blank" class="px-8 py-4 bg-white text-primary font-bold rounded-full hover:bg-gray-100 transition shadow-lg transform hover:scale-105">
                    Visit Our Shop
                </a>
                <a href="{{ route('welcome') }}#topup" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-primary transition shadow-lg">
                    Quick Top-Up
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
