<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PengaduanPublicController extends Controller
{
    //
    public function show(): View
    {

        return view('public.pengaduan', [
            'title' => 'Pengaduan'
        ]);
    }
    public function submit(Request $request)
    {
        $user = Auth::guard('publicusers')->user();
        if ($request->isMethod('post')) {
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
        $DataPengaduan->tanggal = now()->toDateString();
        $DataPengaduan->id_user = $user->id;
        $result = $DataPengaduan->save();
        if ($result) {
            return  redirect()->route('public-hasil')->with('success', 'Berhasil membuat laporan');
        }
    }
}
