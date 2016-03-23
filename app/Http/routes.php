<?php

/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the controller to call when that URI is requested.
 |
 */

//Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers(['password' => 'Auth\PasswordController', ]);

Route::post('password-reset', 'UserController@postReseto');

// HOME PAGE ROUTE
Route::get('/', function() {
	return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {

	// PRINCIPAL ROUTES

	Route::get('principal/dashboard', 'DashboardController@index');
	
	
	// API ROUTES

	Route::get('/api', 'DashboardController@getApi');
	Route::get('api/category-dropdown', 'DashboardController@dashboardDropDown');
	Route::get('api/subject-dropdown', 'ApiController@examDropDown');
	Route::get('api/marks-analysis', 'ApiController@marksAnalysis');
	Route::get('api/student/marks', 'DashboardController@studentMarks');
	Route::get('api/student/attendance', 'DashboardController@studentAttendance');
	Route::get('api/staff/marks', 'DashboardController@staffMarks');
	Route::get('api/staff/attendance', 'DashboardController@staffAttendance');
	Route::get('api/student-dropdown', 'ApiController@studentDropDown');
	Route::get('api/subject/exams/average', 'ApiController@examAverageChart');
	


	
	// PRINCIPAL CREATE ROUTES

	Route::get('principal/create', function() {
		return view('principal/create');
	});

	Route::get('principal/create#staff-tab', 'TeacherController@create');
	Route::post('principal/create/staff', 'TeacherController@store');
	Route::post('principal/update/staff/{id}', 'TeacherController@assignSubject');

	Route::get('principal/create#student-tab', 'StudentController@create');
	Route::post('principal/create/student', 'StudentController@store');

	Route::get('principal/create#exam-tab', 'ExamController@create');
	Route::post('principal/create/exam', 'ExamController@store');
	Route::post('principal/update/exam/{id}', 'ExamController@update');
	
	Route::get('principal/create#role-tab', 'RoleController@create');
	Route::post('principal/create/role', 'RoleController@store');

	Route::get('principal/create#subject-tab', 'SubjectController@create');
	Route::post('principal/create/subject', 'SubjectController@store');
	Route::post('principal/update/subject/{id}', 'SubjectController@update');


	Route::get('principal/create#grade-tab', 'GradeController@create');
	Route::post('principal/create/grade', 'GradeController@store');

	// Route::get('principal/create#mark-tab', 'MarkController@create');
	// Route::get('principal/create/mark', 'MarkController@savemarks');


	// STAFF ROUTES

	Route::resource('staff', 'TeacherController');

	// STUDENT ROUTES

	Route::resource('student', 'StudentController');
	
	// ATTENDANCE ROUTES

	Route::resource('attendance', 'AttendanceController');

	// ADDRESS ROUTES

	Route::resource('address', 'AddressController');
	

	// BASIC FUNCTIONS ROUTE

	Route::get('principal/classroom', 'ClassController@classroom');

	Route::get('principal/classroom/{classId}', function($classId) {
		return view('principal/classes');
	});
	Route::get('principal/create/classroom/{classId}', 'ClassController@students');
 	
	Route::get('principal/create/mark', 'MarkController@savemarks');
	Route::get('principal/update/mark', 'MarkController@update');
	Route::get('principal/marks', function() {
		return view('principal/marks');
	});


	Route::get('api/marks', 'ApiController@allmarks');

 	Route::get('principal/attendance', function() {
		return view('principal/attendance');
	});

	Route::get('principal/chat', function() {
		return view('principal/chat');
	});

	Route::get('principal/feedback', function() {
		return view('principal/feedback');
	});

	Route::get('lock-screen', function() {
		return view('lock-screen');
	});

	Route::get('profilepage', function() {
		return view('principal/profilePage');
	});

	Route::get('/mailbox/inbox', function() {
		return view('emails/inbox');
	});

	Route::get('/mailbox/compose', function() {
		return view('emails.mailCompose');
	});

	Route::post('/mailbox/send', 'StaffEmailController@sendEmailReminder');

	Route::get('/mailbox/message', function() {
		return view('emails.message');
	});

	Route::resource('marketingimage', 'MarketingImageController');

});

// ADMIN ROUTES

Route::get('admin/createclass', ['middleware' => 'auth', 'uses' => 'ClassController@create']);
Route::post('admin/create/class', ['middleware' => 'auth', 'uses' => 'ClassController@store']);
