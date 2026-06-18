<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Setting;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('members')->orderBy('sort_order')->orderBy('id')->get();
        $setting = Setting::first();
        
        $pembina = $organizations->where('section', 'pembina');
        $pengawas = $organizations->where('section', 'pengawas');
        $ketua = $organizations->where('section', 'ketua');
        $sekretaris = $organizations->where('section', 'sekretaris');
        $bendahara = $organizations->where('section', 'bendahara');
        $divisi = $organizations->where('section', 'divisi');

        return view('struktur', compact('pembina', 'pengawas', 'ketua', 'sekretaris', 'bendahara', 'divisi', 'setting'));
    }
}
