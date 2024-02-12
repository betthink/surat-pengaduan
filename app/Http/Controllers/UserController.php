<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function show(string $id): View
    {
        return view('admin.kelola_user', [
            'user' => 'user 01'
        ]);
    }
 
}
