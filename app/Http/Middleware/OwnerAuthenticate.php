<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OwnerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::guard('owner')->check()) {
            // Si l'utilisateur n'est pas connecté, redirigez vers le formulaire de connexion
            return redirect('/owner-login');
        }

    // Sinon, passez la requête au contrôleur suivant
        return $next($request);
    }
}
