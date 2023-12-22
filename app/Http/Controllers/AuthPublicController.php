<?php

namespace App\Http\Controllers;

use App\Models\ModelMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPublicController extends Controller
{
    //
    public function show()
    {
        return view('public.login', ['title' => 'Halaman Login']);
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'username' => strval($validatedData['username']),
            'password' => strval($validatedData['password']),
        ];
        if (Auth::guard('publicusers')->attempt($credentials)) {
            // Autentikasi berhasil

            return redirect()->route('Beranda')->with('success', 'Login berhasil!');
        } else {
            // Autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        Auth::guard('publicusers')->logout();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
