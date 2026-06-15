<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GallerySeeder extends Seeder
{
    public function run()
    {
        DB::table('galleries')->insert([
            [
                'title' => 'Kegiatan Bakti Sosial',
                'image_path' => 'image/kegiatan/kegiatan1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rapat Koordinasi Anggota',
                'image_path' => 'image/kegiatan/kegiatan2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}