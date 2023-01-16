<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirecteurDepartementMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role->nom !== 'directeur_departement' && auth()->user()->role->nom !== 'directeur_etude' && auth()->user()->role->nom !== 'admin') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
