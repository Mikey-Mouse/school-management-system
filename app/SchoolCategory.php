<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCategory extends Model
{
    protected $table = 'schoolcategories';
    protected $fillable = ['school_id','district_id'];
}
