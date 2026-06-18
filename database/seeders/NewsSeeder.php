<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // Membuat 4 data dummy
        for ($i = 1; $i <= 4; $i++) {
            News::create([
                'title'   => 'Berita Contoh IMK ke-' . $i,
                'slug'    => Str::slug('Berita Contoh IMK ke-' . $i),
                'content' => 'Ini adalah isi berita contoh yang ke-' . $i . '. Konten ini dibuat otomatis menggunakan Seeder untuk keperluan pengujian tampilan di halaman utama.',
                'image'   => null, // Bisa dikosongkan dulu
            ]);
        }
    }
}