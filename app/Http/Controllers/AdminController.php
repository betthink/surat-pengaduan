<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function signin(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'username' => strval($validatedData['username']),
            'password' => strval($validatedData['password']),
        ];
        if (Auth::guard('adminusers')->attempt($credentials)) {
            // Autentikasi berhasil
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            // Autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }
}
