<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AfterLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Jika pengguna berhasil login
        if (auth()->check()) {
            // Jika pengguna mencoba mengakses halaman login
            if ($request->is('login')) {
                if (session('error')) {
                    session()->forget('error'); // Hapus session error jika ada
                }
                return redirect('/dashboard');
            }
        }

        return $response;
    }
}
