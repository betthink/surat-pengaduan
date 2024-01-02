<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\View\View;

class PengaduanController extends Controller
{

    public function show(): View
    {
        $dataPengaduan = ModelPengaduan::all()->toArray();
        return view('admin.kelola_pengaduan', ['username' => 'Robetson', 'data' => $dataPengaduan]);
    }
}
