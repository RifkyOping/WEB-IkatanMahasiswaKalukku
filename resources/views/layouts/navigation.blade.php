@if(request()->routeIs('dashboard') || request()->routeIs('profile.*') || request()->is('admin/*'))
    <!-- ========================================== -->
    <!-- DASHBOARD NAVIGATION (AFTER LOGIN)         -->
    <!-- ========================================== -->
    <nav x-data="{ open: false }" class="bg-imk-600 border-b border-imk-500 shadow-md">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('image/logo.png') }}" class="block h-12 w-auto"
                                alt="Logo">
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            {{ __('Dashboard') }}
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.users.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Akun
                        </a>
                        <a href="{{ route('admin.news.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.news.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Berita
                        </a>
                        <a href="{{ route('admin.galleries.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.galleries.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Galeri
                        </a>
                        <a href="{{ route('admin.attachments.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.attachments.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Dokumen
                        </a>
                        <a href="{{ route('admin.settings.edit') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.settings.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Pengaturan Beranda
                        </a>
                        <a href="{{ route('admin.organizations.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.organizations.*') || request()->routeIs('admin.members.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Struktur Organisasi
                        </a>
                        <a href="{{ route('admin.registrations.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.registrations.*') ? 'border-white text-white' : 'border-transparent text-imk-100 hover:text-white hover:border-imk-200' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Data Pendaftar
                        </a>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-imk-600 bg-white hover:bg-imk-50 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                                <div>{{ Auth::user()->name ?? 'User' }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-imk-100 hover:text-white hover:bg-imk-500 focus:outline-none focus:bg-imk-500 focus:text-white transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-imk-700">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('dashboard') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.users.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Kelola Akun
                </a>
                <a href="{{ route('admin.news.index') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.news.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Kelola Berita
                </a>
                <a href="{{ route('admin.galleries.index') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.galleries.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Kelola Galeri
                </a>
                <a href="{{ route('admin.attachments.index') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.attachments.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Kelola Lampiran
                </a>
                <a href="{{ route('admin.settings.edit') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.settings.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Pengaturan Web
                </a>
                <a href="{{ route('admin.organizations.index') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.organizations.*') || request()->routeIs('admin.members.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Kelola Struktur Organisasi
                </a>
                <a href="{{ route('admin.registrations.index') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 {{ request()->routeIs('admin.registrations.*') ? 'border-white text-white bg-imk-500' : 'border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Data Pendaftar
                </a>
                <a href="{{ route('welcome') }}"
                    class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300 text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                    Lihat Web
                </a>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-imk-500">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name ?? 'User' }}</div>
                    <div class="font-medium text-sm text-imk-200">{{ Auth::user()->email ?? '' }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}"
                        class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300 text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                        {{ __('Profile') }}
                    </a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-imk-100 hover:text-white hover:bg-imk-500 hover:border-imk-300 text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
@else
    <!-- ========================================== -->
    <!-- PUBLIC NAVIGATION (BEFORE LOGIN)           -->
    <!-- ========================================== -->
    <nav x-data="{ open: false }"
        class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">

                <div class="flex flex-1 justify-start pl-0 lg:pl-10">
                    <a href="{{ route('welcome') }}">
                        <img class="h-16 w-16 object-contain hover:scale-105 transition-transform"
                            src="{{ asset('image/logo.png') }}" alt="Logo IMK">
                    </a>
                </div>

                <div class="hidden md:flex justify-center flex-none">
                    <div class="flex space-x-1 bg-imk-50/80 p-1.5 rounded-[15px] border border-imk-100/50">
                        <a href="{{ route('welcome') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->is('/') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Beranda
                        </a>
                        <a href="{{ url('/tentang') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->routeIs('tentang') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Tentang
                        </a>
                        <a href="{{ route('berita') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->routeIs('berita') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Berita
                        </a>
                        <a href="{{ route('struktur') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->routeIs('struktur') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Struktur
                        </a>
                        <a href="{{ route('galeri') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->routeIs('galeri') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Galeri
                        </a>
                        <a href="{{ route('lampiran') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->routeIs('lampiran') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Lampiran
                        </a>
                        <a href="{{ route('pendaftaran') }}"
                            class="px-6 py-2 rounded-[10px] text-sm font-bold transition duration-300 {{ request()->routeIs('pendaftaran') ? 'bg-imk-600 text-white shadow-md' : 'text-gray-500 hover:text-imk-600 hover:bg-white' }}">
                            Pendaftaran
                        </a>
                    </div>
                </div>

                <div class="hidden md:flex flex-1 items-center justify-end pr-0 lg:pr-10">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm font-bold bg-imk-100 text-imk-600 hover:bg-imk-200 transition-all duration-300 py-2.5 px-6 rounded-full shadow-sm hover:shadow-md transform hover:-translate-y-0.5 border border-imk-200">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-bold bg-imk-600 text-white hover:bg-imk-500 transition-all duration-300 py-2.5 px-6 rounded-full shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Masuk
                        </a>
                    @endauth
                </div>

                <!-- Hamburger (Mobile) -->
                <div class="flex items-center md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-imk-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-imk-600 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu (Public) -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-b border-gray-100 shadow-lg absolute w-full">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('welcome') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->is('/') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Beranda
                </a>
                <a href="{{ url('/tentang') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->routeIs('tentang') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Tentang
                </a>
                <a href="{{ route('berita') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->routeIs('berita') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Berita
                </a>
                <a href="{{ route('struktur') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->routeIs('struktur') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Struktur
                </a>
                <a href="{{ route('galeri') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->routeIs('galeri') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Galeri
                </a>
                <a href="{{ route('lampiran') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->routeIs('lampiran') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Lampiran
                </a>
                <a href="{{ route('pendaftaran') }}" class="block w-full ps-6 pe-4 py-3 border-l-4 {{ request()->routeIs('pendaftaran') ? 'border-imk-600 text-imk-600 bg-imk-50 font-bold' : 'border-transparent text-gray-600 hover:text-imk-600 hover:bg-gray-50' }} text-base font-medium transition duration-150 ease-in-out">
                    Pendaftaran
                </a>
            </div>
            
            <div class="pt-4 pb-4 border-t border-gray-100 px-6">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex justify-center w-full text-center text-sm font-bold bg-imk-100 text-imk-600 hover:bg-imk-200 transition-all duration-300 py-3 px-6 rounded-xl border border-imk-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex justify-center w-full text-center text-sm font-bold bg-imk-600 text-white hover:bg-imk-500 transition-all duration-300 py-3 px-6 rounded-xl">
                        Masuk Admin
                    </a>
                @endauth
            </div>
        </div>
    </nav>
@endif