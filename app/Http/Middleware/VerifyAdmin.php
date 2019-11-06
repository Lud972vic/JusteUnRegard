<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request->user()->hasRole('Administrateur'));

        /*Si on n'est pas authentifié, ou si pas le role Adminstrateur, on redirige vers la page index*/
        if (!$request->user() || !$request->user()->hasRole('Administrateur')) {
            return redirect()->route('index');
        }
        /*Si rôle admin, on laisse passer*/
        return $next($request);
    }
}
