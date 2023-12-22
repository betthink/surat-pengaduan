<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationPublicController extends Controller
{
    //
    public function show(Request $request)
    {

        if ($request->isMethod('get')) {
            return View('public.registrasi', ['title' => 'Halaman registrasi']);
        }
    }
   
}
