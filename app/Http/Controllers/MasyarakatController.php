<?php

namespace App\Http\Controllers;

use App\Models\ModelMasyarakat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MasyarakatController extends Controller
{

    function show(): View
    {
        $users = ModelMasyarakat::all()->toArray();
        return view('admin.kelola_masyarakat', [
            'username' => 'user01',
            'datauser' => $users
        ]);
    }
    public function addMasyarakat(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('admin.masyarakat.tambah_masyarakat');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
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
        $user->alamat = $request->alamat;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->nik = $request->nik;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        // Simpan pengguna ke dalam database
        $result = $user->save();
        if ($result) {
            return redirect('/kelola-masyarakat')->with('success', 'Berhasil menambahkan masyarakat');
        }
    }
    public function deleteMasyarakat(int $id): RedirectResponse
    {
        $user = ModelMasyarakat::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        try {
            // Hapus pengguna
            $user->delete();
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Masyarakat / user berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }
    public function updateMasyarakatView(int $id)
    {
        $user = ModelMasyarakat::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        return view('admin.masyarakat.edit_masyarakat', ['user' => $user]);
    }

    public function updateMasyarakatData(Request $request, int $id)
    {
        $user = ModelMasyarakat::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required',
            'username' => [
                'required',
                'string',
                'max:255',
            ],
            'nik' => [
                'required'
            ],
        ]);

        // Update data pengguna
        $user->nama = $validatedData['nama'];
        $user->alamat = $validatedData['alamat'];
        $user->tempat_lahir = $validatedData['tempat_lahir'];
        $user->nik = $validatedData['nik'];
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->username = $validatedData['username'];
        $result = $user->save();
        if ($result) {
            return redirect('/kelola-masyarakat');
        }
    }
}
