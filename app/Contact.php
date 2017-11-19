<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['mobile','telephone','account_id'];

    public function account(){
  		return $this->belongsTo(Account::class);
  	}
}
