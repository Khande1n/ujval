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

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::post('password-reset', 'UserController@postReseto');



// HOME PAGE ROUTE
Route::get('/', function () {
    return view('welcome');
});

// PRINCIPAL ROUTES

Route::get('principal/dashboard', 'DashboardController@index');
Route::get('principal/dashboard/{{$student->id}}', 'DashboardController@show');
Route::get('principal/dashboard/api', 'DashboardController@getApi');
Route::get('api/category-dropdown', 'ApiController@dashboardDropDown');
Route::get('api/subject-dropdown', 'ApiController@examDropDown');
Route::get('api/marks-analysis', 'ApiController@marksAnalysis');


Route::get('principal/create', function() {
	return view('principal/create');
});

Route::get('principal/create#staff-tab', 'TeacherController@create');
Route::post('principal/create/staff', 'TeacherController@store');

Route::get('principal/create#student-tab', 'StudentController@create');
Route::post('principal/create/student', 'StudentController@store');

Route::get('principal/create#exam-tab', 'ExamController@create');
Route::post('principal/create/exam', 'ExamController@store');


Route::get('principal/classroom', function() {
	return view('principal/classroom');
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


// ADMIN ROUTES

Route::get('admin/createclass', 'ClassController@create');
Route::post('admin/create/class', 'ClassController@store');

