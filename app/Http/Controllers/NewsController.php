<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
 public function index() 
{
    // 1. Ambil datanya dari database
    $news = News::all(); // atau News::latest()->get();

    // 2. Kirim ke view 'berita' (nama file blade Anda)
    // Pastikan 'news' di compact('news') sama dengan nama variabel $news
    return view('berita', compact('news')); 
}
public function show($slug)
    {
        // Mencari berita di database berdasarkan slug
        // firstOrFail() akan otomatis mengirim error 404 jika berita tidak ditemukan
        $news = News::where('slug', $slug)->firstOrFail();

        // Mengirim data ke view news.show
        return view('news.show', compact('news'));
    }
}
