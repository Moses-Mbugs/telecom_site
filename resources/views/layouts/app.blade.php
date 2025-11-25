<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Telecom Site</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-white shadow fixed w-full top-0 z-50">
        <div class="container flex justify-between items-center py-4">
            <h2 class="text-2xl font-bold text-blue-700">Telecom</h2>

            <ul class="hidden md:flex gap-6">
                <li><a href="#" class="hover:text-blue-600">Home</a></li>
                <li><a href="#services" class="hover:text-blue-600">Services</a></li>
                <li><a href="#blog" class="hover:text-blue-600">Resources</a></li>
                <li><a href="#" class="hover:text-blue-600">Quick Links</a></li>
                <li><a href="#" class="bg-blue-600 text-white px-4 py-2 rounded">Get A Quote</a></li>
            </ul>

            <button id="menuBtn" class="md:hidden text-2xl">☰</button>
        </div>

        {{-- Mobile menu --}}
        <div id="mobileMenu" class="hidden bg-white border-t md:hidden">
            <ul class="p-4 space-y-3">
                <li><a href="#" class="block">Home</a></li>
                <li><a href="#services" class="block">Services</a></li>
                <li><a href="#blog" class="block">Resources</a></li>
                <li><a href="#" class="block">Quick Links</a></li>
                <li><a href="#" class="block bg-blue-600 text-white px-4 py-2 rounded">Get A Quote</a></li>
            </ul>
        </div>
    </nav>

    <div class="pt-24"> {{-- push content below fixed navbar --}}
        @yield('content')
    </div>

</body>
</html>
