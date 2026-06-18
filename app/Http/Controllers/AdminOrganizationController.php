<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class AdminOrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.organizations.index', compact('organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'section' => 'required|in:pembina,pengawas,ketua,sekretaris,bendahara,divisi',
            'sort_order' => 'nullable|integer',
        ]);

        Organization::create($request->all());

        return redirect()->route('admin.organizations.index')->with('success', 'Divisi/Jabatan berhasil ditambahkan.');
    }

    public function edit(Organization $organization)
    {
        // For inline editing or a separate page. Since we might want simple UI, 
        // we can just pass to an edit view.
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'section' => 'required|in:pembina,pengawas,ketua,sekretaris,bendahara,divisi',
            'sort_order' => 'nullable|integer',
        ]);

        $organization->update($request->all());

        return redirect()->route('admin.organizations.index')->with('success', 'Divisi/Jabatan berhasil diperbarui.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('admin.organizations.index')->with('success', 'Divisi/Jabatan berhasil dihapus.');
    }
}
