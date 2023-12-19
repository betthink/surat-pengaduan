<?php

namespace App\Http\Controllers;

use App\Models\ModelKatakunci;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KatakunciController extends Controller
{

    function show(): View
    {
        $data = ModelKatakunci::all()->toArray();
        return view('admin.katakunci.kelola_kata_kunci', [
            'dataKatakunci' => $data
        ]);
    }
    public function addKatakunci(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('admin.katakunci.Tambah_Kata_kunci');
        }

        $validatedData = $request->validate([
            'katakunci' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        // Buat pengguna baru
        $user = new ModelKatakunci();
        $user->kata = $validatedData['katakunci'];
        $user->kategori = $validatedData['kategori'];
        $user->keterangan = $validatedData['keterangan'];

        // Simpan pengguna ke dalam database
        $result = $user->save();
        if ($result) {
            return redirect('kelola-kata-kunci')->with('success', 'Berhasil menambahka kata kunci');
        }
    }
    public function deleteKatakunci(int $id): RedirectResponse
    {
      
        $katakunci = ModelKatakunci::find($id);
        if (!$katakunci) {
            return redirect()->back()->with('error', 'Kata kunci tidak ditemukan.');
        }

        try {
            // Hapus pengguna
            $katakunci->delete();
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'kata kunci berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }
    public function updateMasyarakatView(int $id)
    {
        $user = ModelKatakunci::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        return view('admin.masyarakat.edit_masyarakat', ['user' => $user]);
    }

    public function updateMasyarakatData(Request $request, int $id)
    {
        $user = ModelKatakunci::find($id);
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
