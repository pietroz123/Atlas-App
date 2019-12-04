<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('doctor')->check()) {
            return $next($request);
        }
        
        session()->put('url.intended', URL::current()); // Stores last URL into session
        return redirect()->route('login.doctor')->with('danger', 'Você precisa estar logado para acessar essa funcionalidade');
    }
}
