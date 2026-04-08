<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found – {{ config('app.name', 'Safe World Telecom') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>* { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen flex items-center justify-center text-white">

    <div class="text-center px-6 max-w-xl mx-auto">
        {{-- Big 404 --}}
        <div class="text-[120px] md:text-[180px] font-black leading-none bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent select-none">
            404
        </div>

        {{-- Message --}}
        <h1 class="text-2xl md:text-4xl font-bold mt-4 mb-4">
            Oops! Page Not Found
        </h1>
        <p class="text-gray-300 text-lg mb-10">
            The page you're looking for doesn't exist or has been moved.
            Don't worry, you can always go back home.
        </p>

        {{-- Home Button --}}
        <a href="{{ url('/') }}"
           class="inline-block px-10 py-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-full font-semibold text-lg hover:shadow-2xl hover:shadow-purple-500/50 transform hover:scale-105 transition-all duration-300">
            ← Go Back to Home
        </a>

        {{-- Decorative orbs --}}
        <div class="absolute top-0 left-0 w-72 h-72 bg-purple-600 rounded-full filter blur-3xl opacity-10 pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-blue-600 rounded-full filter blur-3xl opacity-10 pointer-events-none"></div>
    </div>

</body>
</html>
