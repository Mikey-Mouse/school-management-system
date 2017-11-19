<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_register_forms extends Model
{
    protected $table = 'school_register_forms';
    protected $fillable = ['one_schoolform_id','school_id','form_id','level_grade','schoolyear'];
}
