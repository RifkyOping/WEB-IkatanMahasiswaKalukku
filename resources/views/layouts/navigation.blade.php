<nav class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            <div class="flex flex-1 justify-start pl-36">
                <img class="h-11 w-11 object-contain" src="{{ asset('image/Unsulbar-Logo-1.png') }}" alt="Logo UNSULBAR">
            </div>

            <div class="flex justify-center flex-none">
                <div class="flex space-x-1 bg-[#0F2A1D]/70 p-1.5 rounded-[15px] shadow-inner">

                    <a href="{{ route('welcome') }}" 
                       class="px-6 py-2 rounded-[10px] text-xs font-bold transition duration-200 {{ request()->is('/') ? 'bg-[#051F20] text-white shadow' : 'text-white hover:text-gray-200' }}">
                        Beranda
                    </a>

                    <a href="{{ url('/tentang') }}"  
                       class="px-6 py-2 rounded-[10px] text-xs font-bold transition duration-200 {{ request()->routeIs('tentang') ? 'bg-[#051F20] text-white shadow' : 'text-white hover:text-gray-200' }}">
                        Tentang
                    </a>

                    <a href="{{ route('berita') }}" 
                       class="px-6 py-2 rounded-[10px] text-xs font-bold transition duration-200 {{ request()->routeIs('berita') ? 'bg-[#051F20] text-white shadow' : 'text-white hover:text-gray-200' }}">
                        Berita
                    </a>

                    <a href="{{ route('galeri') }}" 
                       class="px-6 py-2 rounded-[10px] text-xs font-bold transition duration-200 {{ request()->routeIs('galeri') ? 'bg-[#051F20] text-white shadow' : 'text-white hover:text-gray-200' }}">
                        Galeri
                    </a>

                </div>
            </div>

            <div class="flex flex-1 items-center justify-end pr-36">
                <a href="{{ route('login') }}"
                   class="text-xs font-bold text-[#051F20] hover:text-emerald-800 transition py-2 px-4">
                    Login
                </a>
            </div>

        </div>
    </div>
</nav>