<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // $roles — lista de roles permitidos para acceder a la ruta
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        // Si no está autenticado lo mandamos al login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verificamos si el rol del usuario está en la lista de roles permitidos
        if (!in_array(Auth::user()->role->name, $roles)) {
            return redirect()->route('home')->with('error', 'No tenés permiso para acceder a esa sección.');
        }

        return $next($request);
    }
}
