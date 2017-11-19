<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
  	protected $fillable = ['account_id','school_name','school_address','school_cen_id','administrator','email'];
    protected $hidden = ['id'];

  	public function account(){
  		return $this->belongsTo(Account::class);
  	}

    public function have_staff(){
      return $this->hasMany(Staff::class);
    }

    public function schoolforms(){
      return $this->hasMany(SchoolForm::class,'school_id','id');
    }

    public function facility(){
      return $this->hasOne(Facility::class,'school_id');
    }

    public function numenrollees(){
      return $this->hasOne(Numenrollees::class,'school_id');
    }

    public function schoolcategories(){
      return $this->hasOne(SchoolCategory::class,'school_id');
    }


}
