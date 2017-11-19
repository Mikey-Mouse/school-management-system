<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Numenrollees extends Model
{

    protected $table = "numenrollees";
    protected $fillable = ['school_id','nur1','nur2','kindergarten','grad1','grad2','grad3','grad4','grad5','grad6'];

    public function school(){
        return $this->belongsTo(School::class);
    }
}
