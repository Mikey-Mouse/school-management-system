<?php

namespace App\Http\Controllers;
use App\School;
use App\dpemployee;
use App\Contact;
use App\Level;
use App\Staff;
use App\Districts;
use App\School_register_forms;
use App\Form;
use App\One_Schoolforms;
use App\SchoolCategory;
use App\Facility;
use Validator;
use App\Numenrollees;
use Illuminate\Support\Facades\Auth;
use \View;
use \Response;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class SchoolView extends Controller
{
	protected $UserIdentifier;
	protected $User_School_ID;
	protected $commands_for_school;


	public function getSchoolId(){
		$school_id;
		$identifier = Auth::user()->id;
		$result = DB::selectOne("SELECT  * from schools as a where a.account_id = '$identifier' ");
		return $school_id = $result->id;
	}

 	public function schooldash(){
		 	//$school = School::find($this->getSchoolId())->schoolcategories;
			$school_id = $this->getSchoolId();
			$get_school_district = DB::selectOne("SELECT a.district_id,d.district from schoolcategories as a INNER JOIN districts as d on a.district_id = d.id where a.school_id = '$school_id'");
			$school_district = Districts::all();
    	return view('School.schooldash',compact('school_district','get_school_district'));
    }


    public function school_enrollee(){
				$enrollee = School::find($this->getSchoolId())->numenrollees;
				$school_id = $this->getSchoolId();
				$levels = DB::table('levels')->orderBy('id')->pluck('level');
				$nursery1 = School_register_forms::where('level_grade', '=','Nursery 1')->where('school_id','=',$school_id)->count();
				$nursery2 = School_register_forms::where('level_grade', '=','Nursey 2')->where('school_id','=',$school_id)->count();
				$kinder = School_register_forms::where('level_grade', '=', 'Kindergarten')->where('school_id','=',$school_id)->count();
				$grade1 = School_register_forms::where('level_grade', '=', 'Grade One')->where('school_id','=',$school_id)->count();
				$grade2 = School_register_forms::where('level_grade', '=', 'Grade Two')->where('school_id','=',$school_id)->count();
				$grade3 = School_register_forms::where('level_grade', '=', 'Grade Three')->where('school_id','=',$school_id)->count();
				$grade4 = School_register_forms::where('level_grade', '=', 'Grade Four')->where('school_id','=',$school_id)->count();
				$grade5 = School_register_forms::where('level_grade', '=', 'Grade Five')->where('school_id','=',$school_id)->count();
				$grade6 = School_register_forms::where('level_grade', '=', 'Grade Six')->where('school_id','=',$school_id)->count();
				$grade_count = [$nursery1,$nursery2,$kinder,$grade1,$grade2,$grade3,$grade4,$grade5,$grade6];
				return view('School.enrolle',compact('enrollee','grade_count','levels'));
    }

    public function school_facility(){
			 $facilities = School::find($this->getSchoolId())->facility;
       return view('School.facility',compact('facilities'));
    }

    public function school_news(){
        return view('School.newsboard');
    }

    public function staff(){
				$staff = School::find($this->getSchoolId())->have_staff;
        return view('School.staff',compact('staff'));
    }

		public function learner_info(){
				$levels = Level::all();
				return view('School.learner_info',compact('levels'));
		}

    public function submission_form(){
				$levels = Level::all();
				$school = School::find($this->getSchoolId())->schoolcategories;
        return view('School.submission_form', compact('levels','school'));
    }

		public function getData(){
			$gradelevel = request('gradelevel');
			$school_id = $this->getSchoolId();
			$result = DB::select("Select a.lrn,a.name,a.sex,a.birthdate,
			    a.age,a.mother_tongue,
					a.birth_place,
			    a.ethic_group,a.religion,
			    a.address,a.mother_name,
			    a.father_name,a.guardian_name,a.contact,b.schoolyear from one_schoolforms as a
			    INNER JOIN school_register_forms as b ON a.id = b.one_schoolform_id
			    where b.level_grade = '$gradelevel'
			    and b.schoolyear = '2017-2018' and b.school_id = '$school_id'");
			return json_encode($result);
			//return $result;
		}

		public function update_information(Request $request)
		{
			$validator = Validator::make($request->all(), [
			 'central' => 'required',
			 'school' => 'required',
			 'address' => 'required|max:255',
			 'administrator' => 'required|max:255',
			 'email' => 'required|email|max:255',
        ]);
				if($validator->fails()) {
					return redirect()->back()->withErrors($validator)->withInput();
				}
				else {
					School::where('account_id',Auth::user()->id)->update(array(
				 'school_name' => request('school'),
				 'school_address' => request('address') ,
				 'school_cen_id' => request('central'),
				 'administrator' => request('administrator'),
				 'email' => request('email')));
					Session::flash('flash_message','School Information Successfully updated');
				  return redirect()->back();
				}
		}

		public function updateContact(Request $request)
		{
				Contact::where('account_id',Auth::user()->id)->update(array(
					'mobile' => request('mobile'),
					'telephone' => request('tel'),
					));
				Session::flash('Contact_flash','Contact Successfully Updated');
				return redirect()->back();
		}

		public function insert_staff(Request $request)
		{
			Staff::create([
				'school_id' => $this->getSchoolId() ,
				'name' => request('name'),
				'staff' => request('staff')
			]);
			Session::flash('Insert_Personnel','Successfully Inserted');
			return redirect()->back();
		}

		public function editStaff($id){
				Session::flash('EditStaff',$id);
				return redirect()->back();
		}

		public function deleteStaff($id){
			$user = Staff::find($id);
			$user->delete();
			return redirect()->back();
		}

		public function update_staff(Request $request){
			Staff::where('id',request('up_id'))->update(array('name' => request('up_name'),'staff' => request('up_staff')));
			return redirect()->back();
		}


		public function facility(Request $request) {

			$validator = Validator::make($request->all(),[
				'school_id' => 'max:11' ,
				'classroom' => 'max:11' ,
				'library' => 'max:11',
				'chairs' => 'max:11',
				'ict' => 'max:11',
				'maletoilet' => 'max:11',
				'femaletoilet' => 'max:11',
				'textbooks' => 'max:11'
			]);

			if($validator->fails()){
					return redirect()->back()->withErrors($validator)->withInput();
			} else
			{
					$user = DB::table('facilities')->where('school_id',$this->getSchoolId())->first();
						if(count($user))
						{
								Facility::where('school_id',$this->getSchoolId())->update([
										'school_id' => $this->getSchoolId(),
										'classroom' => request('classroom'),
										'library' => request('library'),
										'chairs' => request('chairs'),
										'ict' => request('ictroom'),
										'maletoilet' => request('male'),
										'femaletoilet' => request('female'),
										'textbooks' => request('textbooks') ]);
								Session::flash('facility_update','Done');
								return redirect()->back();
				}
				else
				{
							Facility::create([
										'school_id' => $this->getSchoolId(),
										'classroom' => request('classroom'),
										'library' => request('library'),
										'chairs' => request('chairs'),
										'ict' => request('ictroom'),
										'maletoilet' => request('male'),
										'femaletoilet' => request('female'),
										'textbooks' => request('textbooks')]);
							Session::flash('facility_inserted','Done');
							return redirect()->back();
				 }
			}
		}



				public function learner_information(Request $request)
				{
					$validator = Validator::make($request->all(),[
						'Lrn' => 'required|numeric',
						'name' => 'required|max:255',
						'sex' => 'required|max:22',
						'birthdate' => 'required|max:20',
						'birth_place' =>'required|max:255',
						'age' => 'required|numeric|max:100',
						'contact' => 'required|numeric',
						'mother_tongue' => 'required|max:30',
						'religion' => 'required|max:255',
						'address' => 'required|max:255',
						'guardian_name' => 'required|max:255'
					]);

					if($validator->fails()){
						return redirect()->back()->withErrors($validator)->withInput();
					}else {

						$one = One_Schoolforms::create([
							'Lrn' => request('Lrn'),
							'name' => request('name'),
							'sex' => request('sex'),
					    'birthdate' => request('birthdate'),
							'age' => request('age'),
							'mother_tongue' => request('mother_tongue'),
					    'ethic_group' => request('ethic_group'),
					    'religion' => request('religion'),
					    'address' => request('address'),
							'mother_name' => request('mother_name'),
							'father_name' => request('father_name'),
					    'guardian_name' => request('guardian_name'),
							'contact' => request('contact'),
							'birth_place'=> request('birth_place') ,
							'school_id' => $this->getSchoolId()
						]);

						School_register_forms::create([
						  'one_schoolform_id' => $one->id,
						  'school_id' => $this->getSchoolId() ,
						  'level_grade' => request('gradelevel'),
						  'form_id' => 1 ,
						  'schoolyear' => '2017-2018'
						]);


						Session::flash('school_students','1');
						return redirect()->back();
					}
				}

				public function div_district()
				{
					SchoolCategory::where('school_id',$this->getSchoolId())->update(array('district_id' => request('district')));
					Session::flash('div_dis','done');
					return redirect()->back();
				}

				public function section_learners_data($grade){
					$str_grade = str_replace('_',' ',$grade);
					$school_id = $this->getSchoolId();
					$result = DB::select("Select a.id,a.lrn,a.created_at,a.name,a.sex,a.birthdate,a.age,a.mother_tongue,a.birth_place,a.ethic_group,a.religion,a.address,a.mother_name,a.father_name,a.guardian_name,a.contact,b.schoolyear from one_schoolforms as a INNER JOIN school_register_forms as b ON a.id = b.one_schoolform_id where b.level_grade = '$str_grade' and b.schoolyear = '2017-2018' and b.school_id = '$school_id'");
					return view('School.section_learners_data')->with(array('grade' => $grade,'student_list' => $result));
				}

				public function delete_data($id){
						DB::table('school_register_forms')->where('one_schoolform_id','=',$id)->delete();
						DB::table('one_schoolforms')->where('id','=',$id)->delete();
						return redirect()->back();
				}

				public function edit_data($id){
						$levels = Level::all();
						$user = one_schoolforms::find($id);

						if($user->school_id == $this->getSchoolId()){
							$grade_user_level = DB::table('school_register_forms')->where('one_schoolform_id','=',$id)->first();
							return view('School.edit_student_data')->with(array('levels' => $levels,'user' => $user,'grade_user_level' =>$grade_user_level));
						}
						else
						{
							return redirect()->back();
						}
				}

			public function update_learner_information($id){
					$one = new One_Schoolforms();
					$one->update_learner_information($id);
					return redirect()->back();
			}
}
