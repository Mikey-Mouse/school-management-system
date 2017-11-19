<?php

namespace App\Http\Controllers;
use App\Account;
use App\School;
use App\dpemployee;
use App\Facility;
use App\SchoolCategory;
use \Auth;
use \View;
use Validator;
use App\Numenrollees;
use App\Contact;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    protected $username;
    protected $school_id;
    protected $school_name;

   public function loginUser(Request $request){

       $validator = Validator::make($request->all(), [
 				    'username' => 'required',
            'password' => 'required'
         ]);

	 	if(Auth::attempt(array('username' => request('username'),'password' => request('password'),'active' => 1))){
	 		  if(Auth::user()->role_id == '1'){
                  return redirect()->intended('SchoolDash');
        } else if(Auth::user()->role_id == '2') {
                  return redirect()->intended('depEmployee');
        } else if(Auth::user()->role_id == '3') {
                  return redirect()->intended('admin');
        } else if(Auth::user()->role_id == 'DEVADMIN') {
                  return redirect()->intended('developer');
        }
	 	}
	 		return redirect('/')->withErrors(['msg' => 'Incorrect Username or Password']);
   }

   public function registerUser(Request $request){

    $validator = Validator::make($request->all(), [
         'username' => 'required',
         'password' => 'required'
      ]);

      $this->username = request('username');
      $this->school_id = request('s_id');
      $this->school_name = request('s_name');

   		if(request('HIDE_IDEN') == '1'){
         $results = DB::select("SELECT a.username,b.school_cen_id,b.email from accounts as a
                              INNER JOIN schools as b ON a.id = b.account_id where a.username = '$this->username'
                              or b.school_cen_id = '$this->school_id' or b.school_name = '$this->school_name'");
         if(empty($results)){
           $user = account::create(['username'=>request('username'),'password'=> bcrypt(request('password')),'role_id' => '1','active' => '1']);
           $school = School::create([
          'account_id' => $user->id,
          'school_cen_id' =>request('s_id'),
          'school_name' => request('s_name'),
          'school_address' => request('sch_address'),
          'administrator' => request('administrator'),
          'email' => request('email') ]);

          Contact::create([
          'account_id' => $user->id
          ]);

          Numenrollees::create([
            'school_id' => $school->id
          ]);

          Facility::create([
            'school_id' => $school->id
          ]);

          SchoolCategory::create([
            'school_id' => $school->id
          ]);

          Session::flash('flash_message','Successfully Inserted');
          return redirect()->back();
         }
          return redirect()->back()->withErrors(['msg' =>'Account already exist']);
   		}
   		else if(request('HIDE_IDEN') == '2')
      {
        $deped = DB::table('accounts')->where('username','=',request('username'))->get();

        if(count($deped)){
            Session::flash('exist_dep_acc','Account Already exist');
            return redirect()->back();
        }
        else
        {
          $user = account::create([
            'username'=>request('username'),
            'password'=> bcrypt(request('password')),
            'role_id' => '2',
            'active' => '1']);

          dpemployee::create([
             'account_id'=>$user->id,
              'name'=>request('e_name'),
              'address'=>request('e_add'),
              'gov_department_id' => request('gov_department_id'),
              'contact'=>request('e_con')]);

          return redirect('/');
        }
   		}
   }

   public function destroy(){
   	Auth::logout();
   	return redirect('/');
   }

   public function schoolInformation(){

   }
}
