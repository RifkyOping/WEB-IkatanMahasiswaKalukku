@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12 pt-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('welcome') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-imk-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('galeri') }}" class="ml-1 text-sm font-medium text-gray-500 hover:text-imk-600 md:ml-2">Galeri Kegiatan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 line-clamp-1 max-w-[200px]">{{ $gallery->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <article class="bg-white rounded-[39px] shadow-xl overflow-hidden p-8 md:p-12">
            
            <header class="mb-10 text-center">
                <p class="text-sm text-emerald-600 font-bold tracking-widest uppercase mb-3">
                    {{ $gallery->date ? \Carbon\Carbon::parse($gallery->date)->format('d M Y') : ($gallery->created_at ? $gallery->created_at->format('d M Y') : '') }}
                    @if($gallery->end_date)
                        - {{ \Carbon\Carbon::parse($gallery->end_date)->format('d M Y') }}
                    @endif
                </p>
                <h1 class="text-4xl md:text-5xl font-black text-[#051F20] leading-tight mb-6">
                    {{ $gallery->title }}
                </h1>
            </header>

            @php
                $imagesArray = is_array($gallery->images) ? $gallery->images : [];
            @endphp

            @if(count($imagesArray) > 0)
            <div x-data="{ currentImageIndex: 0 }" class="relative w-full rounded-3xl overflow-hidden bg-gray-100 mb-12 group h-[300px] md:h-[500px]">
                @foreach($imagesArray as $index => $img)
                <img x-show="currentImageIndex === {{ $index }}" 
                     src="{{ asset('storage/' . $img) }}" 
                     alt="{{ $gallery->title }}" 
                     class="w-full h-full object-cover transition-opacity duration-500"
                     style="display: {{ $index === 0 ? 'block' : 'none' }};">
                @endforeach

                @if(count($imagesArray) > 1)
                <div>
                    <!-- Prev Button -->
                    <button @click="currentImageIndex = currentImageIndex > 0 ? currentImageIndex - 1 : {{ count($imagesArray) - 1 }}" 
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 backdrop-blur-sm focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <!-- Next Button -->
                    <button @click="currentImageIndex = currentImageIndex < {{ count($imagesArray) - 1 }} ? currentImageIndex + 1 : 0" 
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 backdrop-blur-sm focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    
                    <!-- Indicators -->
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2">
                        @foreach($imagesArray as $index => $img)
                            <button @click="currentImageIndex = {{ $index }}" 
                                    :class="currentImageIndex === {{ $index }} ? 'bg-white w-8' : 'bg-white/50 w-2 hover:bg-white/80'" 
                                    class="h-2 rounded-full transition-all duration-300 focus:outline-none"></button>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif

            <div class="prose prose-lg prose-emerald max-w-none text-gray-700 leading-relaxed whitespace-pre-line mb-12">
                {!! nl2br(e($gallery->content)) !!}
            </div>
            
            <div x-data="{
                shareContent() {
                    navigator.clipboard.writeText(window.location.href).then(() => {
                        if(typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Link kegiatan berhasil disalin ke clipboard!',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                        } else {
                            alert('Link halaman berhasil disalin ke clipboard!');
                        }
                    });
                }
            }" class="pt-8 border-t border-gray-100 flex flex-wrap gap-4 items-center justify-between">
                
                <div class="flex flex-wrap gap-4">
                    @if($gallery->drive_link)
                    <a href="{{ $gallery->drive_link }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-imk-600 text-white hover:bg-imk-700 rounded-full font-bold shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        <span>Lihat Dokumentasi Lengkap</span>
                    </a>
                    @endif
                    
                    <button @click="shareContent()" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 hover:bg-emerald-600 hover:text-white rounded-full font-bold transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                        <span>Salin Link</span>
                    </button>
                </div>

                <a href="{{ route('galeri') }}" class="text-gray-500 hover:text-imk-600 font-bold inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Galeri
                </a>
            </div>

        </article>
    </div>
</div>
@endsection
