<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gov_department;
use App\Activity;
use Auth;
use DB;
use App\Events\depedStaffEvent;
use App\Events\create_activity_report;
use Event;
use Validator;
use \Session;
use App\Events\account_deped;

class ViewsController
{

	public   $account_id; 

	public function index(){
		return view('welcome');
	}

	public function registerNow(){
		$department = Gov_department::all();
		return view('Admin.register',compact('department'));
	}

	public function get_Account_Id()
	{	
		$user_id = DB::table('dpemployees')->where('account_id',Auth::user()->id)->first();
		return $user_id->id;
	}

	
    public function depEmployee(){
    	return view('Staff.staffdash');
    }

    public function admin(){
        return view('Admin.AdminDash');
    }

    public function developer(){
        return view('Developer.dev_dash');
    }

	public function account(){
		//$activity_list = Activity::find()->Activity
		return view('Staff.account');
	}

	public function report(){
		return view('Staff.report');
	}

	public function activity(){
		return view('Staff.activity');
	}n

	public function create_activity(Request $request) {
		$validator = Validator::make($request->all(), [
			'activity' => 'required',
			'location' => 'required',
			'date' => 'required',
			'description' => 'required'
			]);

		if($validator->fails())
		{

			return redirect()->back()->withErrors($validator);
		}
		else
		{
			
			Event::fire(new create_activity_report($this->get_Account_Id(),request('activity'),request('location'),request('date'),request('description')));
			Session::flash('activity_success','0');
			return redirect()->back();
		}

		
	}

	public function update_account(Request $request)
	{

		$validator = Validator::make($request->all(),[
			'username' => 'required|max:25',
			'password' => 'required|max:25',
			'name' => 'required',
			'address' => 'required',
			'contact' => 'required|numeric'
			]);

		if($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}
		else
		{	
			Event::fire(new account_deped('username ','password'));
			//Session::flash('update_trigger','1');
			//return redirect()->back();
		}
		
	}

}
