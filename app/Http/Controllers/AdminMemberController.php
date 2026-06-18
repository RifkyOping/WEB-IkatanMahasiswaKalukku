<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Member;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    public function index(Organization $organization)
    {
        $members = $organization->members;
        return view('admin.members.index', compact('organization', 'members'));
    }

    public function store(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $organization->members()->create($request->all());

        return redirect()->route('admin.members.index', $organization->id)->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        $organization = $member->organization;
        return view('admin.members.edit', compact('organization', 'member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $member->update($request->all());

        return redirect()->route('admin.members.index', $member->organization_id)->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $organizationId = $member->organization_id;
        $member->delete();

        return redirect()->route('admin.members.index', $organizationId)->with('success', 'Anggota berhasil dihapus.');
    }
}
