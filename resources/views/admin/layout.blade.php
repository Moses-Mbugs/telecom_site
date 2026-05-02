<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – {{ config('app.name', 'Safe World Telecom') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>* { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-primary text-white flex flex-col flex-shrink-0">
        <div class="p-6 border-b border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-tight flex items-center gap-2">
                <svg class="w-5 h-5 text-[#b5342a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                Admin Panel
            </a>
            <p class="text-xs text-gray-400 mt-1">{{ config('app.name') }}</p>
        </div>

        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.homepage.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.homepage.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Manage Homepage
            </a>

            <a href="{{ route('admin.testimonials.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Manage Testimonials
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.products.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Manage Products
            </a>
 
             <a href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.categories.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                 Manage Categories
             </a>
 
             <a href="{{ route('admin.brands.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.brands.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                 Manage Brands
             </a>

            <a href="{{ route('admin.locations.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.locations.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Manage Locations
            </a>

            <div class="pt-3 pb-1 px-4">
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-semibold">Content</p>
            </div>

            <a href="{{ route('admin.careers.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.careers.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Manage Careers
            </a>

            <a href="{{ route('admin.services.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.services.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                Manage Services
            </a>

            <a href="{{ route('admin.events.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.events.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Manage Events
            </a>

            <a href="{{ route('admin.sdg.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.sdg.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Manage SDG
            </a>

            <a href="{{ route('admin.partners.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.partners.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Manage Partners
            </a>

            <a href="{{ route('admin.enquiries.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.enquiries.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                M-Pesa Enquiries
            </a>

            <a href="{{ route('admin.service-enquiries.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.service-enquiries.*') ? 'bg-white/20 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                Service Enquiries
            </a>
        </nav>

        <div class="p-4 border-t border-white/10">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-sm text-gray-400 hover:text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Site
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 flex flex-col overflow-hidden">
        {{-- Top Bar --}}
        <header class="bg-white border-b px-8 py-4 flex items-center justify-between shadow-sm">
            <h1 class="text-lg font-semibold text-gray-700">@yield('page-title', 'Admin')</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">Logged in as <strong>{{ auth()->user()->name ?? 'Admin' }}</strong></span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 transition">Logout</button>
                </form>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-6 px-5 py-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 px-5 py-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

@stack('scripts')
</body>
</html>
