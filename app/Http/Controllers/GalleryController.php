<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index()
{
    $galleries = \App\Models\Gallery::all();
    return view('galeri', compact('galleries'));
}
}
