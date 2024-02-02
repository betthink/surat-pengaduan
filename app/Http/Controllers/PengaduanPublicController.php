<?php

namespace App\Http\Controllers;

use App\Models\ModelKatakunci;
use App\Models\ModelPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PengaduanPublicController extends Controller
{
    //
    public function show()
    {
        $user = Auth::guard('publicusers')->user();

        $all_kata_kunci = ModelKatakunci::all()->toArray();
        // Buat array baru hanya untuk kategori 'pidana'
        $dataPidana = array_filter($all_kata_kunci, function ($item) {
            return $item['kategori'] === 'Pidana';
        });
        // Buat array baru hanya untuk kategori 'perdata'
        $dataPerdata = array_filter($all_kata_kunci, function ($item) {
            return $item['kategori'] === 'Perdata';
        });
        return view('public.pengaduan', [
            'title' => 'Pengaduan',
            'user' => $user,
            'kata_kunci' =>
            ['pidana' => $dataPidana, 'perdata' => $dataPerdata]

        ]);
    }
    public function submit(Request $request)
    {
        $user = Auth::guard('publicusers')->user();
        if ($request->isMethod('post')) {
            $kalimat = $request->input('deskripsi');
            // Aturan pengelompokan sederhana berdasarkan kata kunci
            $kategori = $this->getKategori($kalimat);
            $validatedData = $request->validate([

                'nama_terlapor' => 'required|string',
                'judul_perkara' => 'required|string',
                'deskripsi' => 'required|string',
            ]);
        }
        $DataPengaduan = new ModelPengaduan();
        $DataPengaduan->nama_terlapor = $request->nama_terlapor;
        $DataPengaduan->judul_perkara = $request->judul_perkara;
        $DataPengaduan->deskripsi = $request->deskripsi;
        $DataPengaduan->status = 'Diproses';
        // 
        $DataPengaduan->hasil = $kategori;
        $DataPengaduan->tanggal = now()->toDateString();
        $DataPengaduan->id_user = $user->id;
        $result = $DataPengaduan->save();
        if ($result) {
            return  redirect()->route('public-hasil')->with('success', 'Berhasil membuat laporan');
        }
    }


    private function getKategori($kalimat)
    {
        $kategori = 'tidak terdeteksi'; // Kategori default jika tidak cocok dengan aturan
        $list_kategori = ModelKatakunci::all()->toArray();

        foreach ($list_kategori as $kategoriModel) {
            $kata = strtolower($kategoriModel['kata']);

            if (stripos(strtolower($kalimat), $kata) !== false) {
                $kategori = $kategoriModel['kategori']; // Mengambil nama kategori dari model
                break; // Keluar dari perulangan jika menemukan satu kata cocok
            }
        }
        return $kategori;
    }
}
