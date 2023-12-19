<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PengaduanController extends Controller
{

    public function show(): View
    {
        return view('admin.kelola_pengaduan', ['username' => 'Robetson']);
    }
}
