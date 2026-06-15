@extends('layouts.app')

@section('content')
<div x-data="{ open: false, selectedNews: { title: '', content: '', image: '', created_at: '' } }">
    
    <div class="relative bg-cover bg-center bg-no-repeat text-white h-[500px] flex items-center justify-center overflow-hidden"
         style="background-image: url('{{ asset('image/bg.jpeg') }}');">
        <div class="absolute inset-0 bg-[#0F2A1D]/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
            <h1 class="text-5xl md:text-[66px] font-bold tracking-tight drop-shadow-md">Berita</h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 lg:px-12 bg-white rounded-[39px] shadow-xl p-10 md:p-16 relative z-20 -mt-14">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black text-[#051F20]">Berita Terbaru Kalukku dan Sekitarnya</h2>
        </div>

        <div class="space-y-6">
            @foreach($news as $item)
            <button @click="open = true; selectedNews = {
                title: '{{ addslashes($item->title) }}',
                content: '{{ addslashes($item->content) }}',
                image: '{{ asset('storage/' . $item->image) }}',
                date: '{{ $item->created_at->format('d M Y') }}'
            }" class="w-full flex items-center gap-6 p-4 rounded-2xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100 text-left">
                
                <div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Berita" class="w-full h-full object-cover">
                </div>
                
                <div class="flex-grow">
                    <h3 class="font-bold text-[#051F20] hover:text-emerald-700">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-400 mt-1">{{ $item->created_at->format('d M Y') }}</p>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-1">{{ Str::limit($item->content, 120) }}</p>
                </div>
            </button>
            @endforeach
        </div>
    </div>

    <div x-show="open" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
         x-transition.opacity>
        
        <div @click.away="open = false" class="bg-white rounded-[39px] p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto relative shadow-2xl">
           <button @click="open = false" 
        class="absolute top-6 right-8 text-gray-400 hover:text-black transition">
    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
</button>
            <img :src="selectedNews.image" class="w-full h-72 object-cover rounded-3xl mb-8">
            
            <h2 class="text-3xl font-black text-[#051F20]" x-text="selectedNews.title"></h2>
            <p class="text-sm text-emerald-700 font-bold mt-2" x-text="selectedNews.date"></p>
            <p class="text-gray-700 mt-6 leading-relaxed text-lg" x-text="selectedNews.content"></p>
        </div>
    </div>
</div>
@endsection