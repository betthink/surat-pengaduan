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
        $laporan = ModelPengaduan::all();
        $users = ModelMasyarakat::all();
        $jumlahUsers = count($users);
        $jumlahLaporan = count($laporan);
        return view('admin.dashboard.index', ['user' => $user, 'jumlah_laporan' => $jumlahLaporan, 'jumlah_user' => $jumlahUsers, 'title' => 'Dashboard']);
    }
}
