<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use \View;
use DB;
class EmployeeSecurity
{

  protected $id;
  public function  __construct(){
      $this->id = Auth::user()->id;
      $profile = DB::table('dpemployees')->where('account_id',$this->id)->first();
      View::share(array('user' => $profile,'identifier' => $this->id));
  }

    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check() && Auth::user()->role_id == '2') {
            return $next($request);
        }
         return redirect()->back();
    }
}
