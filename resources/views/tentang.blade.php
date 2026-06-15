@extends('layouts.app')

@section('content')
    <div class="relative bg-cover bg-center bg-no-repeat text-white h-[500px] flex items-center justify-center overflow-hidden"
        style="background-image: url('{{ asset('image/bg.jpeg') }}');">

        <div class="absolute inset-0 bg-[#0F2A1D]/40"></div>

        <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
            <h1 class="text-5xl md:text-[66px] font-bold tracking-tight drop-shadow-md">
                Tentang IMK
            </h1>
            
           
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 lg:px-12 bg-white rounded-[39px] shadow-xl p-10 md:p-16 relative z-20 -mt-14 text-center">
    
    <div class="flex justify-center mb-6">
        <img src="{{ asset('image/logo-imk.png') }}" alt="Logo IMK" class="w-32 h-32 md:w-40 md:h-40 object-contain">
    </div>

    <h2 class="text-3xl md:text-4xl font-black text-[#051F20] mb-6">Ikatan Mahasiswa Kalukku</h2>
    
    <p class="text-gray-600 leading-relaxed mb-12 max-w-3xl mx-auto">
       Ikatan Mahasiswa Kalukku (IMK) adalah organisasi kedaerahan yang bersifat independen, didirikan di Kalukku pada tanggal 21 Januari 2018, dan berkedudukan di Kabupaten Majene. Organisasi ini berfungsi sebagai wadah untuk mempersatukan dan menghimpun seluruh mahasiswa asal Kecamatan Kalukku yang sedang menimba ilmu di Kabupaten Majene. Berasaskan Pancasila dan UUD 1945, IMK memegang peran penting sebagai organisasi kaderisasi dan perjuangan yang bertujuan membina anggotanya menjadi insan yang beriman, bertaqwa, berilmu, kreatif, kritis, dan berguna bagi masyarakat, bangsa, serta negara. Dengan mengusung slogan "Mesa Pattuju" (Satu Tujuan) dan menjunjung tinggi semboyan "Tak sedarah, satu daerah, kita saudara", serta berlandaskan nilai-nilai agama, budaya, dan kekeluargaan, IMK berkomitmen melahirkan kaum intelektual yang profesional agar kelak dapat kembali untuk mengabdi dan membangun daerah Kecamatan Kalukku.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="p-6">
            <h4 class="text-emerald-700 font-bold uppercase tracking-widest mb-4 border-b-2 border-emerald-700 inline-block">Tujuan</h4>
            <p class="text-gray-700 text-sm leading-relaxed text-justify">
                Terbinanya mahasiswa Kalukku menjadi insan yang beriman, bertaqwa, berilmu, kreatif, kritis yang berguna bagi masyarakat, bangsa dan negara serta bertanggung jawab atas terwujudnya masyarakat adil.
            </p>
        </div>

        <div class="p-6">
            <h4 class="text-emerald-700 font-bold uppercase tracking-widest mb-4 border-b-2 border-emerald-700 inline-block">Fungsi</h4>
            <p class="text-gray-700 text-sm leading-relaxed text-justify">
                Ikatan Mahasiswa Kalukku (IMK) berfungsi sebagai organisasi yang mempersatukan dan menghimpun seluruh mahasiswa Kalukku yang sedang menimba ilmu di Kab. Majene.
            </p>
        </div>

        <div class="p-6">
            <h4 class="text-emerald-700 font-bold uppercase tracking-widest mb-4 border-b-2 border-emerald-700 inline-block">Usaha</h4>
            <p class="text-gray-700 text-sm leading-relaxed text-justify">
                Membina kader Ikatan Mahasiswa Kalukku untuk menjadi insan yang berintelektual dan mampu bersaing secara profesional serta menjadikan Ikatan Mahasiswa Kalukku (IMK) sebagai organisasi yang menjunjung tinggi nilai agama, budaya, dan kekeluargaan.
            </p>
        </div>

    </div>
</div>

@endsection