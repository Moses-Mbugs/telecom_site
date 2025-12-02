@extends('layouts.app')

@push('styles')
<style>
    /* Global Professional Background */
    body {
        background-color: #f3f4f6;
    }

    /* --- 🌟 Glassmorphism Card Style (retained) 🌟 --- */
    .glass-card {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    /* --- 🚀 Hero Section Dynamic Styling --- */
    .hero-section-dynamic {
        position: relative; /* Needed for absolute positioning of particles */
        overflow: hidden; /* Ensure particles don't spill */
        /* Deep, modern background for contrast with particle effect */
        background: linear-gradient(135deg, #1f2937 0%, #0d121c 100%);
        color: white; /* Ensure text is visible */
        z-index: 1;
    }

    /* Particle container - Will hold the canvas */
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0; /* Behind the content */
    }

    /* Hero content must be above the particles */
    .hero-content {
        position: relative;
        z-index: 10;
    }

    /* Custom Focus/Active States */
    .focus-ring-red:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.4);
    }
    .filter-sidebar {
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

</style>
@endpush

@section('content')

    <section class="w-full hero-section-dynamic">
        {{-- 1. Particle.js Container --}}
        <div id="particles-js"></div>

        {{-- 2. Hero Content (Must have a higher z-index) --}}
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10 items-center py-24 px-6 hero-content">
            <div>
                <h1 class="text-6xl font-extrabold text-white leading-tight mb-4 tracking-tighter">
                    <span class="text-red-500">Instant Access.</span> Flexible Payments.
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Get the latest phone today with a plan that fits your budget. Start with as little as a **2,500 KES** deposit.
                </p>
                <a href="#products" class="inline-block bg-red-600 hover:bg-red-500 text-white text-lg font-semibold px-10 py-4 rounded-full shadow-2xl transition duration-300 transform hover:scale-[1.05]">
                    Explore Our Smart Plans &rarr;
                </a>
            </div>
            <div class="flex justify-center lg:justify-end">
                {{-- Modern graphic/phone illustration placeholder --}}

            </div>
        </div>
    </section>

    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    // Initialize Particle.js with a sleek, minimalist config
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff" // White particles for contrast
            },
            "shape": {
                "type": "circle",
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#e0e0e0", // Light gray lines
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 2,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "grab" // Connect lines on hover
                },
                "onclick": {
                    "enable": true,
                    "mode": "push" // Add particles on click
                },
                "resize": true
            }
        },
        "retina_detect": true
    });
</script>
@endpush

    {{-- Rest of the content from the previous iteration --}}
    <div class="max-w-7xl mx-auto mt-12 px-6 grid grid-cols-12 gap-10">
        <aside class="col-span-12 md:col-span-3 p-8 rounded-2xl filter-sidebar shadow-md sticky top-6 self-start">
            <h2 class="text-xl font-bold text-gray-800 mb-6">🔍 Filter Products</h2>

            <div class="mb-8">
                <h3 class="font-bold text-gray-700 mb-3 border-b pb-2">Categories</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <input type="checkbox" id="cat-smartphones" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="cat-smartphones" class="cursor-pointer">Smartphones</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="cat-tablets" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="cat-tablets" class="cursor-pointer">Tablets</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="cat-screen" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="cat-screen" class="cursor-pointer">Screen Replacements</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="cat-batteries" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="cat-batteries" class="cursor-pointer">Batteries</label>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-gray-700 mb-3 border-b pb-2">Brand</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <input type="checkbox" id="brand-samsung" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="brand-samsung" class="cursor-pointer">Samsung</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="brand-iphone" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="brand-iphone" class="cursor-pointer">iPhone</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="brand-infinix" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="brand-infinix" class="cursor-pointer">Infinix</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="brand-tecno" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 mr-3">
                        <label for="brand-tecno" class="cursor-pointer">Tecno</label>
                    </li>
                </ul>
            </div>
            <button class="w-full mt-6 bg-gray-800 text-white py-3 rounded-xl hover:bg-gray-900 transition font-medium">Apply Filters</button>
        </aside>

        <main id="products" class="col-span-12 md:col-span-9">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-3 sm:mb-0">Featured Products</h2>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-700 font-medium">Sort by:</span>
                    <select class="border-gray-300 rounded-xl shadow-sm p-3 bg-white hover:border-gray-400 transition focus-ring-gray">
                        <option>Recommended</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest Arrivals</option>
                    </select>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 0; $i < 6; $i++)
                <div class="p-5 glass-card">
                    <div class="w-full h-48 bg-gray-100 rounded-xl mb-4 flex items-center justify-center overflow-hidden">


[Image of a sleek, modern smartphone product]

                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">MegaPhone Pro {{ $i + 1 }}</h3>
                    <p class="text-red-600 font-semibold text-lg mb-3">KES 12,000</p>
                    <p class="text-gray-600 mb-4 text-sm">
                        Or start with a **KES 2,500 deposit** and pay **KES 1,500/month**.
                    </p>
                    <button class="bg-gray-800 text-white w-full py-3 rounded-xl hover:bg-black transition duration-200 font-semibold focus-ring-red">
                        View Details
                    </button>
                </div>
                @endfor
            </div>
        </main>

    </div>

@endsection
