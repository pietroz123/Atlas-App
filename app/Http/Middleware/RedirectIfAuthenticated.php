<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "doctor" && Auth::guard($guard)->check()) {
            return redirect()->intended('/dashboard/medico');
        }
        if ($guard == "patient" && Auth::guard($guard)->check()) {
            return redirect()->intended('/dashboard/paciente');
        }
        if (Auth::guard($guard)->check()) {
            return redirect()->intended('/');
        }

        return $next($request);
    }
}
