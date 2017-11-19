<?php
use Illuminate\Support\Facades\Storage;



Route::group(['middleware' =>['web','WrongUrl']],function () {

		Auth::routes();
		Route::post('/loginUser','TaskController@loginUser')->name('loginUser');
		Route::get('/registerNow', 'ViewsController@registerNow');
		Route::post('/registerUser','TaskController@registerUser')->name('registerUser');
		Route::get('/event','School_get_Ids@getListener');
		

Route::group(['middleware' => ['guest']], function () {
		Route::get('/','ViewsController@index');
});


Route::group(['middleware' => ['AdminSecurity']] ,function () {

		Route::get('/admin','SchoolView@admin')->name('admin');
});

Route::group(['middleware' => ['SchoolSecurity','SchoolCons']], function () {
	Route::get('/SchoolDash' ,'SchoolView@schooldash')->name('SchoolDash');
	Route::get('/enrollees','SchoolView@school_enrollee')->name('enrollee');
	Route::get('/facility','SchoolView@school_facility')->name('facility');
	Route::get('/staff','SchoolView@staff')->name('staff');
	Route::get('/submission_form','SchoolView@submission_form')->name('submission_form');
	Route::post('/facility','SchoolView@facility')->name('facility');
	Route::post('/updateContact','SchoolView@updateContact')->name('updateContact');
	Route::post('/insert_staff','SchoolView@insert_staff')->name('insert_staff');
	Route::get('/editStaff/{id}','SchoolView@editStaff')->name('editStaff');
	Route::get('/deleteStaff/{id}','SchoolView@deleteStaff')->name('deleteStaff');
	Route::post('/update_staff','SchoolView@update_staff')->name('update_staff');
	Route::get('/logout','TaskController@destroy')->name('logout');
	Route::post('/saveEnrollees','SchoolView@saveEnrollees')->name('saveEnrollees');
	Route::post('/update_information','SchoolView@update_information')->name('update_information');
	Route::post('/learner_information', 'SchoolView@learner_information')->name('learner_information');
	Route::post('/div_district','SchoolView@div_district')->name('div_district');
    Route::post('/getRequest', 'SchoolView@getData');
	Route::get('/learner_info','SchoolView@learner_info')->name('learner_info');
	Route::get('/section_learners_data/{grade}','SchoolView@section_learners_data')->name('section_learners_data');
	Route::get('delete_data/{id}','SchoolView@delete_data')->name('delete_data');
	Route::get('edit_data/{id}','SchoolView@edit_data')->name('edit_data');
	Route::post('/update_learner_information/{id}','SchoolView@update_learner_information')->name('update_learner_information');
});


Route::group(['middleware' => ['EmployeeSecurity']], function () {
		Route::get('/depEmployee' ,'ViewsController@depEmployee')->name('depEmployee');
		Route::get('/account','ViewsController@account')->name('account');
		Route::get('/report','ViewsController@report')->name('report');
		Route::get('/activity','ViewsController@activity')->name('activity');
		Route::post('/create_activity','ViewsController@create_activity')->name('create_activity');
		Route::post('/update_account','ViewsController@update_account')->name('update_account');
});


Route::group(['middleware' => ['DeveloperSecurity']], function () {
		Route::get('/developer','ViewsController@developer')->name('developer');
});


Route::group(['middleware' =>['SecurityUser']], function () {

		Route::get('/logout','TaskController@destroy')->name('logout');

	});


});
