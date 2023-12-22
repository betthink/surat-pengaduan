<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login dengan guard 'publicusers'
        if (Auth::guard('publicusers')->check()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login publik
        return redirect('/')->with('error', 'Anda harus login untuk mengakses halaman ini.');
    }
}
