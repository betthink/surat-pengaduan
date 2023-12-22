<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function show(): View
    {
        $user = Auth::guard('publicusers')->user();
        return view('admin.dashboard', ['user' => $user]);
    }
}
