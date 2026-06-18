<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function index()
    {
        $attachments = Attachment::latest()->get();
        return view('lampiran', compact('attachments'));
    }

    public function download(Attachment $attachment)
    {
        if ($attachment->file_path && Storage::disk('public')->exists($attachment->file_path)) {
            return Storage::disk('public')->download($attachment->file_path, $attachment->original_name);
        }
        
        return back()->with('error', 'File tidak ditemukan.');
    }
}
