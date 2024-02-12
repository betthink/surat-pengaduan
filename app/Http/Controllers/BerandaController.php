<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    //
    public function show(): View
    {
        $user = Auth::guard('publicusers')->user();
        $hasil = ModelPengaduan::all();
        $jumlah_laporan_selesai = count($hasil->filter(function ($item) {
            return $item['status'] === 'Selesai';
        })->toArray());
        $jumlah_laporan_diproses = count($hasil->filter(function ($item) {
            return $item['status'] === 'Diproses';
        })->toArray());
        // return View('public.beranda', ['user' => $user, 'title' => 'Beranda']);
        return View('public.beranda.index', ['user' => $user, 'title' => 'Beranda', 'data' => $hasil, 'laporan_selesai' => $jumlah_laporan_selesai, 'laporan_diproses' => $jumlah_laporan_diproses]);
    }
}
