<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Portal</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-100 antialiased min-h-screen flex flex-col justify-between selection:bg-amber-500 selection:text-black relative overflow-x-hidden">

        <div class="absolute inset-0 w-full h-full overflow-hidden -z-10 pointer-events-none fixed">
            <div class="absolute inset-0 bg-black/75 md:bg-black/65 z-10"></div>
            <img src="{{ asset('img/foto.jpg') }}" alt="Background Simphony MB" class="w-full h-full object-cover">
        </div>

        <header class="w-full bg-gray-950/40 backdrop-blur-md py-4 border-b border-gray-800/40 shadow-lg z-20">
            <div class="max-w-4xl mx-auto px-6 flex justify-between items-center">

                <div class="flex items-center gap-2 md:gap-3">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo Simphony MB" class="h-7 w-7 md:h-9 md:w-9 object-contain rounded-full shadow-md">

                    <a href="/" class="text-base md:text-lg font-black text-amber-500 tracking-widest uppercase transition hover:opacity-80 leading-none">
                        SIMPHONY <span class="text-white font-light">MB</span>
                    </a>
                </div>

                <a href="/" class="text-xs font-semibold text-gray-400 hover:text-amber-400 transition duration-300 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </header>

        <main class="w-full flex-grow flex flex-col sm:justify-center items-center px-4 py-8 z-20">

            <div class="mb-6 animate-fade-in text-center">
                <a href="/" class="inline-block">
                    <h2 class="text-2xl font-black tracking-widest text-white">
                        PORTAL <span class="text-amber-500">ADMIN</span>
                    </h2>
                    <div class="h-1 w-12 bg-amber-500 mx-auto mt-2 rounded-full"></div>
                </a>
            </div>

            <div class="w-full sm:max-w-md bg-gray-900/80 border border-gray-800/80 rounded-2xl p-6 md:p-8 shadow-2xl backdrop-blur-lg overflow-hidden transition duration-300">
                {{ $slot }}
            </div>

        </main>

        <footer class="w-full bg-gray-950/40 backdrop-blur-md text-center py-4 text-gray-600 text-[10px] md:text-xs border-t border-gray-900/60 tracking-wider z-20">
            <p>&copy; 2026 Simphony Al Washliyah 2 Perdagangan. All Rights Reserved.</p>
        </footer>

    </body>
</html>
