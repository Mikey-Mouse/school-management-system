<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = ['activity_title','location','date','description','dpemployees_id'];


    public function Activity()
    {
    	return $this->belongsTo(Account::class);
    }
}
