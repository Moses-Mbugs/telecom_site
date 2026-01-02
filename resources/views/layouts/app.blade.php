{{-- layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Safe World Telecom - Modern telecom solutions for the future">
    <title>{{ config('app.name', 'Safe World Telecom') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#253748',
                        secondary: '#7e7f74',
                        accent: '#a02b2b',
                        neutral: '#f1f5f9',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(102, 126, 234, 0.4)',
                        'glow-lg': '0 0 40px rgba(102, 126, 234, 0.6)',
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'slide-down': 'slideDown 0.3s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-100%)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Gradient Background Animation */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .gradient-animate {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        /* Glass Effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dark {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Navbar Styles */
        .navbar-shrink {
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Menu Animation */
        .mobile-menu-enter {
            animation: slideDown 0.3s ease-out;
        }

        /* Link Hover Effect */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            /* UPDATED GRADIENT: Deep Slate to Muted Khaki */
            background: linear-gradient(90deg, #253748, #7e7f74);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

       /* Scroll Progress Bar */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            /* UPDATED GRADIENT: Deep Slate to Muted Khaki */
            background: linear-gradient(90deg, #253748, #7e7f74);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar-track {
            background: #1e293b; /* Keeping a dark track */
        }

        ::-webkit-scrollbar-thumb {
            /* UPDATED GRADIENT: Deep Slate to Muted Khaki */
            background: linear-gradient(180deg, #253748, #7e7f74);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            /* UPDATED GRADIENT: Muted Khaki to Deep Slate (Reverse) */
            background: linear-gradient(180deg, #7e7f74, #253748);
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #253748, #7e7f74);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(37, 55, 72, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
            opacity: 0;
            transform: translateY(100px);
        }

        .fab.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fab:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 6px 25px rgba(37, 55, 72, 0.6);
        }

        /* Footer Links Hover */
        .footer-link {
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        .footer-link:hover {
            transform: translateX(5px);
            color: #253748;
        }

        /* Loading Animation */
        .loader {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid #253748;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Hamburger Animation */
        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            background: white;
            margin: 5px 0;
            transition: 0.3s;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-neutral text-gray-900 antialiased">

    <!-- Scroll Progress Bar -->
    <div id="scroll-progress"></div>

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 text-white shadow-lg fixed w-full z-50 transition-all duration-300" id="navbar">
        <div class="container mx-auto flex justify-between items-center py-5 px-6">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold flex items-center group">
                <img
                    src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}"
                    alt="Safe World Telecom Logo"
                    class="w-20 h-10 mr-3">
            </a>
            <!-- Desktop Menu -->
            <ul class="hidden md:flex space-x-8 items-center">
                <li><a href="/" class="nav-link hover:text-purple-400 transition font-medium">Home</a></li>
                 <li><a href="{{ route('about') }}" class="nav-link hover:text-primary transition font-medium">About</a></li>
                <li><a href="#services" class="nav-link hover:text-primary transition font-medium">Services</a></li>
                <li><a href="{{ route ('shop') }}" class="nav-link hover:text-primary transition font-medium">Shop</a></li>
                <li>
                    <a href="#contact" class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full font-semibold hover:shadow-glow transition-all duration-300 hover:scale-105">
                        Contact
                    </a>
                </li>
                <a href="{{ route('cart.index') }}" class="relative">
                    🛒 Cart
                    @if(session('cart'))
                        <span class="ml-1 text-xs bg-red-600 text-white px-2 rounded-full">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

            </ul>

            <!-- Mobile Menu Toggle -->
            <button id="menu-toggle" class="md:hidden hamburger focus:outline-none">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden glass-dark mobile-menu-enter">
            <ul class="space-y-4 px-6 py-6">
                <li><a href="/" class="block hover:text-purple-400 transition font-medium py-2">Home</a></li>
                <li><a href="#about" class="block hover:text-purple-400 transition font-medium py-2">About</a></li>
                <li><a href="#services" class="block hover:text-purple-400 transition font-medium py-2">Services</a></li>
                <li><a href="#blog" class="block hover:text-purple-400 transition font-medium py-2">Blog</a></li>
                <li>
                    <a href="#contact" class="block px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full font-semibold text-center hover:shadow-glow transition-all duration-300">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white py-16 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500 rounded-full filter blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Footer Top -->
            <div class="grid md:grid-cols-4 gap-10 mb-12">
                <!-- Products -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Products
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="footer-link text-gray-300">Devices</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Accessories</a></li>
                        <li><a href="#" class="footer-link text-gray-300">IoT Solutions</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Enterprise Tools</a></li>
                    </ul>
                </div>

                <!-- About -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Company
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="footer-link text-gray-300">About Us</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Careers</a></li>
                        <li><a href="#" class="footer-link text-gray-300">FAQs</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Press Kit</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Services
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="#topup" class="footer-link text-gray-300">Pinless Airtime</a></li>
                        <li><a href="#" class="footer-link text-gray-300">M-Pesa Integration</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Fiber Internet</a></li>
                        <li><a href="#" class="footer-link text-gray-300">VoIP Solutions</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div>
                    <h4 class="text-xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Connect
                    </h4>
                    <ul class="space-y-3 mb-6">
                        <li><a href="#" class="footer-link text-gray-300">Find a Store</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Support Center</a></li>
                        <li><a href="#" class="footer-link text-gray-300">Contact Us</a></li>
                    </ul>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    © {{ date('Y') }} Safe World Telecom. All Rights Reserved.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Action Button (Scroll to Top) -->
    <div class="fab" id="scrollToTop">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </div>




       {{--  src="{{ asset('images/safe_world_logo_logo_only.svg') }}"  --}}
