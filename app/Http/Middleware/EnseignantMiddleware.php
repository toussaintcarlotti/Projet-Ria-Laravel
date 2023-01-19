<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnseignantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->status !== 'enseignant' && auth()->user()->status !== 'admin') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
