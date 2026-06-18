@php
    $settings = \App\Models\Setting::first() ?? new \App\Models\Setting([
        'address' => 'Sekretariat IMK<br>Kabupaten Majene, Sulawesi Barat',
        'email' => 'info@imkkalukku.org',
        'phone' => '+62 812 3456 7890',
        'instagram' => 'https://instagram.com',
        'facebook' => 'https://facebook.com',
        'whatsapp' => 'https://wa.me/6281234567890',
        'youtube' => 'https://youtube.com',
    ]);
@endphp
<footer class="bg-[#051F20] text-gray-300 py-16 mt-auto border-t-[8px] border-imk-500">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
            <!-- Brand Info -->
            <div class="space-y-6">
                <a href="{{ route('welcome') }}" class="flex items-center gap-3">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo IMK" class="h-16 w-auto bg-white/10 p-2 rounded-xl backdrop-blur-sm border border-white/5">
                    <div>
                        <h3 class="text-white font-black text-xl leading-tight">Ikatan Mahasiswa</h3>
                        <h3 class="text-white font-black text-xl leading-tight">Kalukku</h3>
                    </div>
                </a>
                <p class="text-white text-sm leading-relaxed font-light">
                    Ikatan Mahasiswa Kalukku (IMK) adalah organisasi kedaerahan yang bersifat independen, didirikan di Kalukku pada tanggal 21 Januari 2018, dan berkedudukan di Kabupaten Majene.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-white"></span> Menu Utama
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('welcome') }}" class="text-white hover:text-gray-300 transition flex items-center gap-2 group"><svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" class="text-white hover:text-gray-300 transition flex items-center gap-2 group"><svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Tentang Kami</a></li>
                    <li><a href="{{ route('berita') }}" class="text-white hover:text-gray-300 transition flex items-center gap-2 group"><svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Berita</a></li>
                    <li><a href="{{ route('galeri') }}" class="text-white hover:text-gray-300 transition flex items-center gap-2 group"><svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Galeri</a></li>
                    <li><a href="{{ route('lampiran') }}" class="text-white hover:text-gray-300 transition flex items-center gap-2 group"><svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> Lampiran</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            @if(($settings->show_address ?? true) || ($settings->show_email ?? true) || ($settings->show_phone ?? true))
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-white"></span> Kontak
                </h4>
                <ul class="space-y-4">
                    @if($settings->show_address ?? true)
                    <li class="flex items-start gap-3 text-white text-sm">
                        <svg class="w-5 h-5 text-white mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{!! $settings->address !!}</span>
                    </li>
                    @endif
                    @if($settings->show_email ?? true)
                    <li class="flex items-center gap-3 text-white text-sm">
                        <svg class="w-5 h-5 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:{{ $settings->email }}" class="hover:text-gray-300 transition">{{ $settings->email }}</a>
                    </li>
                    @endif
                    @if($settings->show_phone ?? true)
                    <li class="flex items-center gap-3 text-white text-sm">
                        <svg class="w-5 h-5 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <a href="tel:{{ $settings->phone }}" class="hover:text-gray-300 transition">{{ $settings->phone }}</a>
                    </li>
                    @endif
                </ul>
            </div>
            @endif

            <!-- Social Media -->
            @if(($settings->show_instagram ?? true) || ($settings->show_facebook ?? true) || ($settings->show_whatsapp ?? true) || ($settings->show_youtube ?? true))
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-white"></span> Media Sosial
                </h4>
                <div class="flex gap-4">
                    @if($settings->show_instagram ?? true)
                    <a href="{{ $settings->instagram }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-pink-500 hover:to-purple-600 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    @endif
                    @if($settings->show_facebook ?? true)
                    <a href="{{ $settings->facebook }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#1877F2] rounded-xl flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                    @endif
                    @if($settings->show_whatsapp ?? true)
                    <a href="{{ $settings->whatsapp }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#25D366] rounded-xl flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.88-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.347-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                    @endif
                    @if($settings->show_youtube ?? true)
                    <a href="{{ $settings->youtube }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-[#FF0000] rounded-xl flex items-center justify-center transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between text-sm text-white">
            <p>&copy; {{ date('Y') }} Ikatan Mahasiswa Kalukku. Seluruh Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>