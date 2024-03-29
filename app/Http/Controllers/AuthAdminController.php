<?php

namespace App\Http\Controllers;

use App\Models\ModelAuthAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    //
    public function show()
    {
        if (Auth::guard('adminusers')->check()) {
            // Jika sudah login, alihkan ke halaman beranda
            return redirect()->route('dashboard');
        }
        return view('admin.login_admin', ['title' => 'Halaman login admin']);
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

        if (Auth::guard('adminusers')->attempt($credentials)) {
            // Autentikasi berhasil
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            // Autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }
    public function logout()
    {
        Auth::guard('adminusers')->logout();
        return redirect()->route('admin-login')->with('success', 'Log out Admin berhasil!');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.registerAdmin', ['title' => 'Halaman Registrasi Admin']);
        } elseif ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'username' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:admin,username', // Menambahkan aturan unik untuk kolom 'username'
                ],
                'password' => 'required|min:6',
            ]);
            // Buat user admin baru
            $user = new ModelAuthAdmin();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->level = 'admin';
            $user->status = 'Off';
            // Simpan pengguna ke dalam database
            $result = $user->save();
            if ($result) {
                return redirect()->route('admin-login')->with('success', 'Admin account berhasil dibuat!');
            } else {
                return redirect()->back();
            }
        }
    }
}
