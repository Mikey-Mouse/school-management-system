<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class dpemployee extends Model
{
     protected $table = 'dpemployees';
  	protected $fillable = ['account_id','name','address','contact','gov_department_id'];
}
