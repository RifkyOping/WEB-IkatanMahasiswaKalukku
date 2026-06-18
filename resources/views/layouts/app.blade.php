<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow flex-shrink-0">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            @if(!request()->routeIs('dashboard') && !request()->routeIs('profile.*') && !request()->is('admin/*') && !request()->routeIs('login') && !request()->routeIs('register'))
                @include('layouts.footer')
            @endif
        </div>

        <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            AOS.init({
                duration: 800,
                once: true,
                offset: 100,
            });

            // SweetAlert2 Delete Confirmation
            document.addEventListener('DOMContentLoaded', function () {
                const deleteForms = document.querySelectorAll('.delete-form');
                deleteForms.forEach(form => {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data yang dihapus tidak akan dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Hapus!',
                            cancelButtonText: 'Batal',
                            buttonsStyling: false,
                            customClass: {
                                popup: 'rounded-[30px] shadow-2xl border border-gray-100 p-6',
                                title: 'text-2xl font-black text-[#051F20] mt-4',
                                htmlContainer: 'text-gray-500 mt-2',
                                actions: 'mt-8 gap-4 flex w-full justify-center',
                                confirmButton: 'px-8 py-3 bg-red-500 text-white font-bold rounded-full hover:bg-red-600 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5',
                                cancelButton: 'px-8 py-3 bg-gray-100 text-gray-700 font-bold rounded-full hover:bg-gray-200 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
    </body>
</html>
