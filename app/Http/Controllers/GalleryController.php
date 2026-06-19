<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
    {
        // Mengambil data riil dari database
        $galleries = \App\Models\Gallery::orderBy('date', 'desc')->get();

        return view('galeri', compact('galleries'));
    }

    public function show(\App\Models\Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }
}
