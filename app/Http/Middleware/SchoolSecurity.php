<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use \View;
use \School;
use \Account;

class SchoolSecurity
{



    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check() && Auth::user()->role_id == '1') {
            return $next($request);
        }
         return redirect()->back();
    }
}
