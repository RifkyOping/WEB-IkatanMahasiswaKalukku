<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>
        <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased relative w-full min-h-screen flex items-center justify-center overflow-hidden">
        
        <!-- Beautiful Gradient Background -->
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-imk-50 via-white to-imk-200"></div>
        
        <!-- Decorative Glowing Shapes -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-imk-300 rounded-full mix-blend-multiply filter blur-[100px] opacity-40 animate-pulse z-0"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-imk-400 rounded-full mix-blend-multiply filter blur-[120px] opacity-30 animate-pulse z-0" style="animation-delay: 2s;"></div>

        <div class="relative z-20 w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-[0_20px_50px_rgba(5,31,32,0.08)] sm:rounded-[30px] border border-gray-100">
            
            <div class="flex justify-center mb-8">
                <a href="/" class="group">
                    <img src="{{ asset('image/logo.png') }}" class="w-24 h-24 object-contain transform group-hover:scale-105 transition-transform duration-300 drop-shadow-md" alt="Logo IMK">
                </a>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-2xl font-black text-imk-600">Selamat Datang</h2>
                <p class="text-sm text-gray-500 mt-1">Silakan masuk ke akun Anda</p>
            </div>

            {{ $slot }}
            
        </div>
    </body>
</html>
