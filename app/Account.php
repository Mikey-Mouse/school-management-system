<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use  \Illuminate\Database\Query\Builder;

class Account extends Model implements Authenticatable
{
  	use \Illuminate\Auth\Authenticatable;

  	protected $table = 'accounts';
  	protected $fillable = ['username','password','role_id','active'];
  	protected $hidden = ['password','remember_token'];

  	public function schools(){
  		return $this->hasOne(School::class);
  	}

    public function contact(){
  		return $this->hasOne(Contact::class);
  	}
}
