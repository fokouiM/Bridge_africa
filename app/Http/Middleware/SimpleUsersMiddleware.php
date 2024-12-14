<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class SimpleUsersMiddleware
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
        if(isset(Auth::user()->id)){
            if (Auth::user()->statut == 1 || Auth::user()->statut == 2) {
                return redirect('/home'); // Rediriger vers une route spécifique
            }
        }

        return $next($request); // Poursuivre la requête
    }
}
