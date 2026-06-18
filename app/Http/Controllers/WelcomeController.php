<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Organization;
use App\Models\Setting;

class WelcomeController extends Controller
{
   public function index() {
        // Mengambil 4 berita terbaru
        $news = News::latest()->take(4)->get();
        
        // Mengambil data struktur organisasi
        $organizations = Organization::with('members')->orderBy('sort_order')->orderBy('id')->get();
        $setting = Setting::first();
        
        $pembina = $organizations->where('section', 'pembina');
        $pengawas = $organizations->where('section', 'pengawas');
        $ketua = $organizations->where('section', 'ketua');
        $sekretaris = $organizations->where('section', 'sekretaris');
        $bendahara = $organizations->where('section', 'bendahara');
        $divisi = $organizations->where('section', 'divisi');

        return view('welcome', compact('news', 'pembina', 'pengawas', 'ketua', 'sekretaris', 'bendahara', 'divisi', 'setting'));
   }
}
