<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        $totalUsers = $users->count();

        return view('admin.users.index', compact('users', 'totalUsers'));
    }
}
