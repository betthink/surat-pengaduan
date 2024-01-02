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
            return redirect()->back()->with('success', 'kata kunci berhasil dihapus');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }
    public function updateKatakunci(int $id)
    {

        $katakunci = ModelKatakunci::find($id);
        if (!$katakunci) {

            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        return view('admin.katakunci.edit_kata_kunci', ['katakunci' => $katakunci]);
    }

    public function updateKatakunciPost(Request $request, int $id)
    {
        $katakunci = ModelKatakunci::find($id);
        if (!$katakunci) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        $validatedData = $request->validate([
            'katakunci' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);
        $katakunci->kata = $validatedData['katakunci'];
        $katakunci->kategori = $validatedData['kategori'];
        $katakunci->keterangan = $validatedData['keterangan'];
        $result = $katakunci->save();
        if ($result) {
            return redirect('/kelola-kata-kunci')->with('success', 'berhasil melakukan edit data');
        }
    }
}
