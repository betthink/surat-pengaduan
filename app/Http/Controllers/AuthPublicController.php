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
        if (Auth::guard('publicusers')->check()) {
            // Jika sudah login, alihkan ke halaman beranda
            return redirect()->route('public-pengaduan');
        }
        return view('auth.login_public', ['title' => 'Halaman Login']);
        // return view('public.login_public', ['title' => 'Halaman Login']);
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
            return redirect()->route('public-pengaduan')->with('success', 'Login berhasil!');
        } else {
            // Autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        Auth::guard('publicusers')->logout();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('public.registrasi_public', ['title' => 'Halaman register']);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'username' => [
                'required',
                'string',
                'numeric',
                'max:17',
                Rule::unique('masyarakat', 'username'),
            ],
            'password' => 'required|min:6',
            'alamat' => 'required|string',
            'nomor_telp' => 'required|string',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|string',
            'nik' => [
                'required',
                Rule::unique('masyarakat', 'nik'),
            ],
        ]);
        // Buat pengguna baru
        $user = new ModelMasyarakat();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->nomor_telp = $request->nomor_telp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->nik = $request->nik;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $isPublic = $request->status === 'public';
        $result = $user->save();
        if ($result && $isPublic) {
            return redirect()->route('public-login')->with('success', 'Berhasil registrasi akun');
        } elseif ($result) {
            return redirect('/kelola-masyarakat');
        }
    }
}
