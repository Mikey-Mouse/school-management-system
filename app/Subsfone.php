<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsfone extends Model
{
    protected $table = 'subsfones';
    protected $fillable = ['form_id','level_id','school_id','Lrn','name','sex','age',
                           'birthdate','mother_tongue','ethic_group',
                           'religion','address','mother_name','father_name',
                           'guardian_name','contact'];
}
