{{--  home.blade.php  --}}

@extends('layouts.app')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #4BA261FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #4BA268FF 100%);
    }

    .service-card {
        position: relative;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .service-card:hover::before {
        left: 100%;
    }

    .service-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.5;
        animation: blob 7s infinite;
    }

    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .blog-card {
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .blog-card:hover {
        transform: translateY(-8px);
    }

    .blog-card:hover img {
        transform: scale(1.1);
    }

    .nav-link {
        position: relative;
        transition: color 0.3s;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: #667eea;
        transition: width 0.3s;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .topup-input {
        transition: all 0.3s;
    }

    .topup-input:focus {
        transform: scale(1.02);
    }

    .pulse-button {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .8;
            transform: scale(1.05);
        }
    }
</style>
@endpush

@section('content')

{{-- ===================== HERO SECTION WITH PARTICLES ===================== --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
    <div id="particles-js"></div>

    <!-- Animated Blobs -->
    <div class="blob w-96 h-96 bg-purple-500 top-20 left-20"></div>
    <div class="blob w-80 h-80 bg-blue-500 bottom-20 right-20" style="animation-delay: 2s;"></div>
    <div class="blob w-72 h-72 bg-pink-500 top-1/2 right-1/4" style="animation-delay: 4s;"></div>

    <!-- Hero Content -->
    <div class="relative z-10 text-center px-4 max-w-6xl mx-auto">
        <div class="floating">
            <h1 class="text-6xl md:text-8xl font-extrabold text-white mb-6 leading-tight">
                Welcome to<br/>
                <span class="gradient-text">Safe World Telecom</span>
            </h1>
        </div>

        <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Experience our latest initiative, and products & services that have been innovated to transform lives of Kenyans.
        </p>

        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <a href="#services" class="pulse-button px-10 py-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-full font-semibold text-lg shadow-2xl hover:shadow-purple-500/50 transition-all duration-300 transform hover:scale-105">
                Explore our Products
            </a>
            {{--  <a href="#topup" class="px-10 py-4 glass-card text-white rounded-full font-semibold text-lg hover:bg-white/20 transition-all duration-300">
                Top Up Now
            </a>  --}}
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20">
            <div class="glass-card p-6 rounded-2xl">
                <div class="stat-number" data-target="19">0</div>
                <p class="text-gray-300 mt-2">Retail Outlets</p>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="stat-number" data-target="3">0</div>
                <p class="text-gray-300 mt-2">Franchise Locations</p>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="stat-number" data-target="800">0</div>
                <p class="text-gray-300 mt-2">M-Pesa sub agencies</p>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="stat-number" data-target="16">0</div>
                <p class="text-gray-300 mt-2">Mobile vans</p>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10">
        <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white rounded-full mt-2 animate-bounce"></div>
        </div>
    </div>
</section>

{{-- ===================== SERVICES SECTION ===================== --}}
<section id="services" class="py-32 px-6 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-20 fade-in">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">
                Our <span class="gradient-text">Services</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comprehensive telecom solutions tailored to your needs
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-10">
            <!-- Top-up Service -->
            <div class="service-card bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-3xl shadow-xl fade-in">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Top-Up Services</h3>
                <p class="text-gray-600 mb-6">Instant pinless airtime top-up for all major networks. Fast, secure, and reliable.</p>
                <a href="#topup" class="inline-block px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Top Up Now →
                </a>
            </div>

            <!-- M-Pesa Solutions -->
            <div class="service-card bg-gradient-to-br from-green-50 to-teal-50 p-8 rounded-3xl shadow-xl fade-in" style="transition-delay: 0.1s;">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">M-Pesa Solutions</h3>
                <p class="text-gray-600 mb-6">Seamless M-Pesa integration to grow your business with secure payments.</p>
                <a href="#quote" class="inline-block px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Get A Quote →
                </a>
            </div>

            <!-- Internet Services -->
            <div class="service-card bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-3xl shadow-xl fade-in" style="transition-delay: 0.2s;">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Internet Services</h3>
                <p class="text-gray-600 mb-6">High-speed fiber, IoT solutions, and LTE for home and office connectivity.</p>
                <a href="#quote" class="inline-block px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Get A Quote →
                </a>
            </div>
            <!-- IoT Services -->
            <div class="service-card bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-3xl shadow-xl fade-in" style="transition-delay: 0.2s;">
                <!-- Icon Circle -->
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <!-- IoT / Network style icon -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>

                <!-- Title -->
                <h3 class="text-2xl font-bold mb-3 text-indigo-900">IoT Solutions</h3>

                <!-- Description -->
                <p class="text-gray-700 mb-6">
                    Connect your home or office with high-speed fiber, LTE networks, and smart IoT solutions for seamless productivity.
                </p>

                <!-- CTA Button -->
                <a href="#quote" class="inline-block px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Get A Quote →
                </a>
            </div>

        </div>
    </div>
</section>

{{-- ===================== TOP UP SECTION ===================== --}}
<section id="topup" class="py-32 px-6 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10">
        <h2 class="text-5xl md:text-6xl font-bold text-white mb-6 fade-in">
            Quick <span class="gradient-text">Top-Up</span>
        </h2>
        <p class="text-xl text-gray-300 mb-12 fade-in">
            Recharge your line instantly with just one click
        </p>

        <div class="glass-card p-10 rounded-3xl fade-in">
            <form id="topupForm" class="flex flex-col md:flex-row gap-4">
                @csrf
                <input
                    type="tel"
                    id="phoneNumber"
                    placeholder="Enter phone number (e.g., 0712345678)"
                    class="topup-input flex-1 px-6 py-4 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-all duration-300"
                    required
                />
                <button
                    type="submit"
                    class="px-10 py-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl font-semibold hover:shadow-2xl hover:shadow-purple-500/50 transform hover:scale-105 transition-all duration-300">
                    Top Up Now
                </button>
            </form>

            <div class="mt-8 flex justify-center gap-8">
                <div class="text-white">
                    <p class="text-sm text-gray-400">Instant Processing</p>
                    <p class="font-semibold">✓ Under 5 seconds</p>
                </div>
                <div class="text-white">
                    <p class="text-sm text-gray-400">Secure Payment</p>
                    <p class="font-semibold">✓ 256-bit Encryption</p>
                </div>
                <div class="text-white">
                    <p class="text-sm text-gray-400">All Networks</p>
                    <p class="font-semibold">✓ 100% Coverage</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== HIGHLIGHTS SECTION ===================== --}}
<section class="py-32 px-6 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-20 fade-in">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">
                Why Choose <span class="gradient-text">Us</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="text-center p-8 fade-in">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Lightning Fast</h3>
                <p class="text-gray-600">Experience blazing-fast network solutions built for modern demands with 5G technology.</p>
            </div>

            <div class="text-center p-8 fade-in" style="transition-delay: 0.1s;">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">24/7 Support</h3>
                <p class="text-gray-600">Round-the-clock technical assistance from our expert team, always ready to help you.</p>
            </div>

            <div class="text-center p-8 fade-in" style="transition-delay: 0.2s;">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Affordable Plans</h3>
                <p class="text-gray-600">High-quality telecom services tailored to every budget without compromising quality.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================== BLOG SECTION ===================== --}}
<section id="blog" class="py-32 px-6 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-20 fade-in">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">
                Latest <span class="gradient-text">Insights</span>
            </h2>
            <p class="text-xl text-gray-600">Stay updated with industry trends and innovations</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            @php
                $blogPosts = [
                    ['title' => '5G Revolution in Kenya', 'excerpt' => 'Discover how 5G is transforming connectivity', 'color' => 'from-blue-500 to-purple-600'],
                    ['title' => 'The Future of VoIP', 'excerpt' => 'Next-gen voice communication technologies', 'color' => 'from-green-500 to-teal-600'],
                    ['title' => 'Cybersecurity in Telecom', 'excerpt' => 'Protecting your digital infrastructure', 'color' => 'from-red-500 to-pink-600'],
                    ['title' => 'Fiber Optic Innovation', 'excerpt' => 'Advanced cable technologies explained', 'color' => 'from-orange-500 to-yellow-600'],
                ];
            @endphp

            @foreach ($blogPosts as $index => $post)
                <div class="blog-card bg-white rounded-2xl shadow-xl overflow-hidden fade-in" style="transition-delay: {{ $index * 0.1 }}s;">
                    <div class="h-48 bg-gradient-to-br {{ $post['color'] }} relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $post['title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $post['excerpt'] }}</p>
                        <a href="#" class="text-purple-600 font-semibold hover:text-purple-800 transition-colors">
                            Read more →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== CTA SECTION ===================== --}}
<section class="py-32 px-6 bg-gradient-to-br from-purple-900 via-blue-900 to-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-64 h-64 bg-purple-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-blue-500 rounded-full filter blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10">
        <h2 class="text-5xl md:text-6xl font-bold text-white mb-6 fade-in">
            Ready to Get Started?
        </h2>
        <p class="text-xl text-gray-300 mb-12 fade-in">
            Join thousands of satisfied customers who trust our telecom solutions
        </p>
        <a href="#" class="inline-block px-12 py-5 bg-white text-purple-900 font-bold text-lg rounded-full shadow-2xl hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 fade-in">
            Contact Us Today
        </a>
    </div>
</section>

{{-- ======================= Map Section ===================== --}}
<section class="bg-gray-100 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-3">📍 Our Shop Locations</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Find the nearest Safe World Telecom branch.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- MAP -->
            <div class="lg:col-span-2">
                <div id="map" class="w-full h-[500px] rounded-2xl shadow-lg"></div>
            </div>

            <!-- BRANCH LIST -->
            <div class="bg-white rounded-2xl shadow-lg p-6 space-y-4 overflow-y-auto max-h-[500px]">
                <h3 class="text-xl font-semibold mb-4">Our Branches</h3>
                <ul id="branch-list" class="space-y-3"></ul>
            </div>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    // Particles.js Configuration
    particlesJS('particles-js', {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: '#ffffff' },
            shape: { type: 'circle' },
            opacity: { value: 0.5, random: false },
            size: { value: 3, random: true },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#ffffff',
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: false
            }
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: { enable: true, mode: 'repulse' },
                onclick: { enable: true, mode: 'push' },
                resize: true
            }
        },
        retina_detect: true
    });

    // Animated Counter
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateCounter = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target;
            }
        };

        updateCounter();
    }

    // Intersection Observer for Fade-in Animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    // Animate counters when visible
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.stat-number');
                counters.forEach(counter => animateCounter(counter));
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.stat-number').forEach(el => {
        statsObserver.observe(el.parentElement.parentElement);
    });

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Top-up Form Handling
    document.getElementById('topupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const phoneNumber = document.getElementById('phoneNumber').value;

        // Simple validation
        if (phoneNumber.length < 10) {
            alert('Please enter a valid phone number');
            return;
        }

        // Show success message (in production, this would submit to backend)
        alert('Top-up request submitted for ' + phoneNumber);
        this.reset();
    });

    // Parallax Effect on Scroll
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.floating');
        if (parallax) {
            parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
</script>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        if (!document.getElementById('map')) return;

        const branches = [
            { name: "Nairobi CBD – Head Office", lat: -1.286389, lng: 36.817223, address: "Kimathi Street" },
            { name: "Eldoret Branch", lat: 0.5143, lng: 35.2698, address: "Uganda Road" },
            { name: "Kisumu Branch", lat: -0.0917, lng: 34.7680, address: "Oginga Odinga Street" },
            { name: "Nakuru Branch", lat: -0.3031, lng: 36.0800, address: "Kenyatta Avenue" }
        ];

        const map = L.map('map').setView([-1.286389, 36.817223], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const branchList = document.getElementById('branch-list');

        branches.forEach(branch => {
            const marker = L.marker([branch.lat, branch.lng]).addTo(map)
                .bindPopup(`<strong>${branch.name}</strong><br>${branch.address}`);

            const li = document.createElement('li');
            li.className = 'p-3 border rounded-lg cursor-pointer hover:bg-purple-50 transition';
            li.innerHTML = `
                <strong>${branch.name}</strong><br>
                <span class="text-sm text-gray-500">${branch.address}</span>
            `;

            li.onclick = () => {
                map.setView([branch.lat, branch.lng], 14);
                marker.openPopup();
            };

            branchList.appendChild(li);
        });

    });
</script>
@endpush

