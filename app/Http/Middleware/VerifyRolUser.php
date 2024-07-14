<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyRolUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(auth()->user()->rol != 1) {
        //     dd('no puedes ver, tu rol es 2 => DEV');
        // }else {
        //     dd('Puedes ver, tu rol es 1 => RECRUITER');
        // }
        
        //Si el usuario autenticado no es un reclutador, se redirecciona hacia la vista /home
        if(auth()->user()->rol != 1) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
