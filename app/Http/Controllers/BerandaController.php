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
        $hasil = ModelPengaduan::all()->toArray();
        // return View('public.beranda', ['user' => $user, 'title' => 'Beranda']);
        return View('public.beranda.index', ['user' => $user, 'title' => 'Beranda', 'data' => $hasil]);
    }
}
