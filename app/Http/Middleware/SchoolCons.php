<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;
use \View;
class SchoolCons
{

  protected $currentUser;

  public function __construct(){
      $this->currentUser = Auth::User();
      $list = \App\Account::find($this->currentUser->id);

      View::share(array(
        'info' => $getData = $list->schools,
        'contact' =>$getData = $list->contact));
  }

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
