<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

/*Este middleware verifica si el usuario autenticado es un 
administrador antes de permitir el acceso a las rutas protegidas para administradores.*/