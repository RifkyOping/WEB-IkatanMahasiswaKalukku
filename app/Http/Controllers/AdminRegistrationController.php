<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Registration;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::latest()->paginate(10);
        $setting = Setting::firstOrCreate([]);
        return view('admin.registrations.index', compact('registrations', 'setting'));
    }

    public function toggleStatus(Request $request)
    {
        $setting = Setting::firstOrCreate([]);
        $setting->update([
            'is_registration_open' => $request->has('is_registration_open')
        ]);

        $status = $setting->is_registration_open ? 'dibuka' : 'ditutup';
        return redirect()->back()->with('success', "Pendaftaran anggota telah $status.");
    }

    public function show(Registration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function destroy(Registration $registration)
    {
        if ($registration->parent_permit_file) {
            Storage::disk('public')->delete($registration->parent_permit_file);
        }
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
