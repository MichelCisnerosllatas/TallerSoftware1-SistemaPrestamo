<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSessionAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Si no existe la sesión 'usuariologin', redirigir al login
        if (!session()->has('usuariologin')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
