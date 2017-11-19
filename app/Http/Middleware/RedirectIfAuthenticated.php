<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use \View;

class RedirectIfAuthenticated
{

   

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           // return redirect('/home');
            if(Auth::user()->role_id == '1'){
                return redirect('/SchoolDash');
            }
            else {
                return redirect('/depEmployee');
            }
        }
        return $next($request);
    }
}
