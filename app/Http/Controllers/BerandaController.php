<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function show(): View
    {
        return View('public.beranda');
    }
}
