<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\adminEvent;
class School_get_Ids extends Controller
{

    public function getListener()
    {
        $user = array('name' => 'charrel','age' => '12','add' => 'butuan');
        $name = 'charrel jame eramis';
        Event::fire(new adminEvent($user,$name));
        return view('sam');
      }
}
