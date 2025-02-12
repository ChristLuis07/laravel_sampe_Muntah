<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'email:dns|required|unique:users',
            'password' => ['required', Password::min(8)->mixedcase()->letters()->numbers()->symbols()->uncompromised()],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login');

        return redirect('/login');
    }
}
