<?php

namespace App\Http\Controllers;

use App\Models\ModelMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthPublicController extends Controller
{
    //
    public function show()
    {
        return view('public.login_public', ['title' => 'Halaman Login']);
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
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('public.registrasi_public');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required',
            'username' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('tb_masyarakat', 'username'),
            ],
            'password' => 'required|min:6',
            'nik' => [
                'required',
                Rule::unique('masyarakat', 'nik'),
            ],
        ]);
     
        // Buat pengguna baru
        $user = new ModelMasyarakat();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->alamat = $request->alamat;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->nik = $request->nik;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $isPublic = $request->status === 'public';
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if ($result && $isPublic) {
            return redirect()->route('public-login')->with('success', 'Berhasil registrasi akun');
        } elseif ($result) {
            return redirect('/kelola-masyarakat');
        }
    }
}
