<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Controlla se l'utente è autenticato
        if (Auth::check()) {
            $user = Auth::user();

            // Verifica se l'utente è un admin
            if ($user->is_admin() == 1) {
                return redirect('/admin');
            }

            // Altrimenti, se è un utente normale
            return redirect('/');
        }

        // Se l'utente non è autenticato, reindirizza alla pagina welcome
        return $next($request);
    }
}