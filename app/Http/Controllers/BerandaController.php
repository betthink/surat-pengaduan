<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    //
    public function show(): View
    {
        $user = Auth::guard('publicusers')->user();
        return View('public.beranda', ['user' => $user, 'title' => 'Beranda']);
    }
}
