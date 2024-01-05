<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HasilPublicController extends Controller
{
    //
    public function show(): View
    {
        $hasil = ModelPengaduan::all()->toArray();
        return view('public.hasil', [
            'dataHasil' => $hasil,
            'title' => 'Hasil'
        ]);
    }
    public function detail(int $id)
    {
        $dataHasil = ModelPengaduan::find($id);
        if (!$dataHasil) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        dd($dataHasil);
    }
}
