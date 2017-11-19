<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    protected $fillable = ['school_id','classroom','library','chairs','ict','maletoilet','femaletoilet','textbooks'];

    public function school(){
      return $this->belongsTo(School::class,'school_id');
    }
}
