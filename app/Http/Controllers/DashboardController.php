<?php

namespace App\Http\Controllers;

use App\Models\ModelMasyarakat;
use App\Models\ModelPengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function show(): View
    {
        $user = Auth::guard('adminusers')->user();
        $users = ModelMasyarakat::all();
        $laporan = ModelPengaduan::all();
        $pengaduanTerkini =
            ModelPengaduan::orderBy('id', 'desc')->take(5)->get()->toArray();
        $laporanPidana = count($laporan->filter(function ($item) {
            return $item['hasil'] === 'Pidana';
        })->toArray());
        $laporanPerdata = count($laporan->filter(function ($item) {
            return $item['hasil'] === 'Perdata';
        })->toArray());
        $jumlahUsers = count($users);
        $jumlahLaporan = count($laporan);

        // dd($pengaduanTerkini);
        return view('admin.dashboard.index', ['user' => $user, 'jumlah_laporan' => $jumlahLaporan, 'jumlah_user' => $jumlahUsers, 'title' => 'Dashboard', 'pengaduanPidana' => $laporanPidana, 'pengaduanPerdata' => $laporanPerdata, 'datas' => $pengaduanTerkini]);
    }
}
