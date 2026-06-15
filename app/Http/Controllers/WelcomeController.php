<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class WelcomeController extends Controller
{
   public function index() {
    // Mengambil 4 berita terbaru
    $news = News::latest()->take(4)->get();
    return view('welcome', compact('news'));
}
}
