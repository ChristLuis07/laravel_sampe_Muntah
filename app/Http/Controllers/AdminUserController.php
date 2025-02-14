<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua User
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.users.index', [
            'users' => $users,
            'title' => 'Daftar User',
        ]);
    }
}
