@extends('layouts.app')

@section('content')
<div x-data="{ open: false, selectedNews: { title: '', content: '', image: '', created_at: '' } }">
    
    <div class="relative bg-cover bg-center bg-no-repeat text-white h-[500px] flex items-center justify-center overflow-hidden"
         style="background-image: url('{{ asset('image/bg.jpeg') }}');">
        <div class="absolute inset-0 bg-[#0F2A1D]/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
            <h1 class="text-5xl md:text-[66px] font-bold tracking-tight drop-shadow-md">Galeri Kegaitan IMK</h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 lg:px-12 bg-white rounded-[39px] shadow-xl p-10 md:p-16 relative z-20 -mt-14">
     <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Galeri Kegiatan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        @foreach($galleries as $item)
        <div class="group">
            <div class="overflow-hidden rounded-2xl shadow-md transition duration-300 hover:shadow-2xl">
                <img src="{{ asset($item->image_path) }}" 
                     alt="{{ $item->title }}" 
                     class="w-full h-64 object-cover transform transition duration-500 hover:scale-105">
            </div>
            
            <h3 class="mt-4 text-lg font-semibold text-gray-700 text-center group-hover:text-blue-600 transition">
                {{ $item->title }}
            </h3>
        </div>
        @endforeach

    </div>
</div>
@endsection