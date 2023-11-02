<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMahasiswaRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // CheckMahasiswaRole.php
        if (Auth::check() && Auth::user()->$role === 'mahasiswa') {
            return $next($request);
        }

    }

    // public function handle($request, Closure $next, $role)
    // {
    //     if (! $request->mahasiswa()->hasRole($role)) {
    //         // Redirect...
    //     }
 
    //     return $next($request);
    // }
}
