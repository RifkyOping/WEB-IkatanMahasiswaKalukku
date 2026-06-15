@extends('layouts.app')

@section('content')
    <div x-data="{ open: false, selectedNews: { title: '', content: '', image: '', date: '' } }">

        <div class="relative bg-cover bg-center bg-no-repeat text-white h-[500px] flex items-center justify-center overflow-hidden"
            style="background-image: url('{{ asset('image/bg.jpeg') }}');">
            <div class="absolute inset-0 bg-[#0F2A1D]/40"></div>
            <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
                <h1 class="text-5xl md:text-[66px] font-bold tracking-tight drop-shadow-md">Ikatan Mahasiswa Kalukku</h1>
                <p class="mt-4 md:text-[30px] text-lg text-gray-100 max-w-2xl mx-auto drop-shadow leading-relaxed">
                    Mesa Pattuju <br> Tak Sedarah, Satu Daerah, Kita Saudara
                </p>
            </div>
        </div>

        <div
            class="max-w-6xl mx-auto px-6 lg:px-12 bg-white rounded-[39px] shadow-xl p-10 md:p-16 relative z-20 -mt-14 text-center">
            <div class="space-y-6">
                <p class="text-gray-700 leading-relaxed text-justify">Ikatan Mahasiswa Kalukku (IMK) adalah organisasi
                    kedaerahan yang bersifat independen, didirikan di Kalukku pada tanggal 21 Januari 2018, dan berkedudukan
                    di Kabupaten Majene. Organisasi ini berfungsi sebagai wadah untuk mempersatukan dan menghimpun seluruh
                    mahasiswa asal Kecamatan Kalukku yang sedang menimba ilmu di Kabupaten Majene.</p>
                <p class="text-gray-700 leading-relaxed text-justify">Berasaskan Pancasila dan UUD 1945, IMK memegang peran
                    penting sebagai organisasi kaderisasi dan perjuangan yang bertujuan membina anggotanya menjadi insan
                    yang beriman, bertaqwa, berilmu, kreatif, kritis, dan berguna bagi masyarakat, bangsa, serta negara.</p>
                <div class="bg-emerald-50 border-l-4 border-emerald-700 p-6 rounded-r-xl italic shadow-sm">
                    <p class="text-[#051F20] font-semibold text-lg">"Mesa Pattuju" (Satu Tujuan) — Tak sedarah, satu daerah,
                        kita saudara.</p>
                </div>
                <p class="text-gray-700 leading-relaxed text-justify">Dengan berlandaskan nilai-nilai agama, budaya, dan
                    kekeluargaan, IMK berkomitmen melahirkan kaum intelektual yang profesional agar kelak dapat kembali
                    untuk mengabdi dan membangun daerah Kecamatan Kalukku.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10">
                <div
                    class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:border-emerald-200 transition text-left">
                    <div class="text-3xl mb-4">📍</div>
                    <h3 class="font-bold text-[#051F20] mb-2">Organisasi Kaderisasi</h3>
                    <p class="text-sm text-gray-500">Membina insan yang beriman, bertaqwa, dan kreatif.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:border-emerald-200 transition">

                    <div class="text-3xl mb-4">💡</div>

                    <h3 class="font-bold text-[#051F20] mb-2">Pusat Intelektual</h3>

                    <p class="text-sm text-gray-500">Wadah diskusi mahasiswa untuk melahirkan pemikiran kritis dan
                        profesional.

                    </p>

                </div>
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:border-emerald-200 transition">

                <div class="text-3xl mb-4">🤝</div>

                <h3 class="font-bold text-[#051F20] mb-2">Nilai Kekeluargaan</h3>

                <p class="text-sm text-gray-500">Menjunjung tinggi budaya dan nilai agama sebagai fondasi persaudaraan.</p>

            </div>
             <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:border-emerald-200 transition">

                <div class="text-3xl mb-4">🏗️</div>

                <h3 class="font-bold text-[#051F20] mb-2">Pengabdian Daerah</h3>

                <p class="text-sm text-gray-500">Komitmen nyata untuk kembali membangun dan memajukan Kecamatan Kalukku.</p>

            </div>
            </div>
        </div>

        <div class="bg-gray-50 py-20">
            <div class="max-w-5xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-black text-[#051F20] mb-16">Pimpinan Ikatan Mahasiswa Kalukku</h2>
                <div class="flex flex-col md:flex-row justify-center items-center gap-12">
                    <div class="flex flex-col items-center">
                        <div class="w-72 h-96 overflow-hidden rounded-2xl shadow-xl mb-6">
                            <img src="{{ asset('image/pengurus/ketua.jpg') }}" alt="Ketua IMK"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold text-[#051F20]">Nama Ketua</h3>
                        <p class="text-sm text-emerald-700 font-bold mt-1">Ketua Umum IMK</p>
                        <p class="text-xs text-gray-500 mt-1">Periode 2025-2026</p>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 py-20">
                <h2 class="text-3xl font-black text-[#051F20] text-center mb-12">Temukan Berita Baru di IMK</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($news as $item)
                        <button
                            @click="open = true; selectedNews = {
                title: '{{ addslashes($item->title) }}',
                content: '{{ addslashes($item->content) }}',
                image: '{{ asset('storage/' . $item->image) }}',
                date: '{{ $item->created_at->format('M d, Y') }}'
             }"
                            class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition overflow-hidden text-left w-full">
                            <div class="h-48 overflow-hidden"><img src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full h-full object-cover"></div>
                            <div class="p-5">
                                <h3 class="font-bold text-[#051F20] leading-tight mb-3 hover:text-emerald-700">
                                    {{ $item->title }}</h3>
                                <p class="text-xs text-gray-400 mb-2">{{ $item->created_at->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-600 line-clamp-3">{{ Str::limit($item->content, 100) }}</p>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>

            <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
                x-transition>
                <div @click.away="open = false"
                    class="bg-white rounded-[39px] p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto relative shadow-2xl">
                    <button @click="open = false"
                        class="absolute top-6 right-8 text-2xl text-gray-400 hover:text-black">&times;</button>
                    <img :src="selectedNews.image" class="w-full h-72 object-cover rounded-3xl mb-8">
                    <h2 class="text-3xl font-black text-[#051F20]" x-text="selectedNews.title"></h2>
                    <p class="text-sm text-emerald-700 font-bold mt-2" x-text="selectedNews.date"></p>
                    <p class="text-gray-700 mt-6 leading-relaxed text-lg" x-text="selectedNews.content"></p>
                </div>
            </div>
        </div>
    @endsection
