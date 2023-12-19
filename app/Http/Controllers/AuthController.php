<?php

namespace App\Http\Controllers;

use App\Models\ModelAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function show(): View
    {
        return view('auth.login', ['title' => 'Halaman Login Admin']);
    }
    public function addAdmin(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.tambah_admin', ['title' => 'Halaman Tambah Admin']);
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
            $user = new ModelAuth();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->level = 'admin';
            $user->status = 'Off';

            // Simpan pengguna ke dalam database
            $result = $user->save();

            if ($result) {
                return redirect('/')->with('success', 'Admin berhasil ditambahkan!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // Gunakan model pengguna yang sesuai
        $data = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            // Autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }
}
