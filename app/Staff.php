<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable = ['school_id','name','staff'];


    public function belongs_school(){
        return $this->belongsTo(School::class);
    }




}
