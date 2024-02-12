<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilPublicController extends Controller
{
    //
    public function show(): View
    {
        $hasil = ModelPengaduan::all()->toArray();
        $user = Auth::guard('publicusers')->user();

        return view('public.hasil.index', [
            'dataHasil' => array_reverse($hasil),
            'title' => 'Hasil',
            'user' => $user
        ]);
        // return view('public.hasil', [
        //     'dataHasil' => array_reverse($hasil),
        //     'title' => 'Hasil',
        //     'user' => $user
        // ]);
    }
    public function detail(int $id)
    {
        $dataHasil = ModelPengaduan::find($id);
        if (!$dataHasil) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        return view('public.detail_hasil', [
            'title' => 'Halaman detail hasil',
            'data' => $dataHasil
        ]);
    }
}
