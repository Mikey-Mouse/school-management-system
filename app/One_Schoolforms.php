<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class One_Schoolforms extends Model
{
   protected $table = 'one_schoolforms';
   protected $fillable = ['Lrn','name','sex',
                          'birthdate','age','mother_tongue',
                          'ethic_group',
                          'religion',
                          'address','mother_name','father_name',
                          'guardian_name','contact','birth_place','school_id'];

  public static function update_learner_information($id){
    DB::table('one_schoolforms')->where('id','=',$id)->update(array('Lrn' => request('Lrn'), 'name' => request('name'),'sex' => request('sex'),
    'birthdate' => request('birthdate'), 'age' => request('age'), 'mother_tongue' => request('mother_tongue'), 'ethic_group' => request('ethic_group'), 'religion' => request('religion'),
    'address' => request('address'), 'mother_name' => request('mother_name'), 'father_name' => request('father_name'),
    'guardian_name' =>request('guardian_name'), 'contact' => request('contact'), 'birth_place' => request('birth_place')));
    DB::table('school_register_forms')->where('id','=',request('grade_student_id'))->update(array('level_grade' => request('gradelevel')));
    Session::flash('clear_form','yes');
  }


}
