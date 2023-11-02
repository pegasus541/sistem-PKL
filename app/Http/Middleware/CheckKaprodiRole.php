<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckKaprodiRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // CheckKaprodiRole.php
        if (Auth::check() && Auth::user()->role === 'kaprodi') {
            return $next($request);
        }

    }
}
