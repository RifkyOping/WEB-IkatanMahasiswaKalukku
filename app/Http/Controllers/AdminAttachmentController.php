<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAttachmentController extends Controller
{
    public function index()
    {
        $attachments = Attachment::latest()->get();
        return view('admin.attachments.index', compact('attachments'));
    }

    public function create()
    {
        return view('admin.attachments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $filePath = $file->store('attachments', 'public');

        Attachment::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'original_name' => $originalName,
        ]);

        return redirect()->route('admin.attachments.index')->with('success', 'Lampiran berhasil diunggah!');
    }

    public function edit(Attachment $attachment)
    {
        return view('admin.attachments.edit', compact('attachment'));
    }

    public function update(Request $request, Attachment $attachment)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('file')) {
            // Delete old file
            if ($attachment->file_path && Storage::disk('public')->exists($attachment->file_path)) {
                Storage::disk('public')->delete($attachment->file_path);
            }

            $file = $request->file('file');
            $data['original_name'] = $file->getClientOriginalName();
            $data['file_path'] = $file->store('attachments', 'public');
        }

        $attachment->update($data);

        return redirect()->route('admin.attachments.index')->with('success', 'Lampiran berhasil diperbarui!');
    }

    public function destroy(Attachment $attachment)
    {
        if ($attachment->file_path && Storage::disk('public')->exists($attachment->file_path)) {
            Storage::disk('public')->delete($attachment->file_path);
        }
        $attachment->delete();

        return redirect()->route('admin.attachments.index')->with('success', 'Lampiran berhasil dihapus!');
    }
}
