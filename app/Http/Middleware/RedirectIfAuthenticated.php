<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1) {

            // return redirect()->route('admin.dashboard');

        }else if(Auth::guard($guard)->check() && Auth::user()->role->id == 2){

            // return redirect()->route('author.dashboard');

        }else if(Auth::guard($guard)->check() && Auth::user()->role->id == 3){

            // return redirect()->route('cashier.dashboard');

        }else {

            return $next($request);

        }

    }
}
