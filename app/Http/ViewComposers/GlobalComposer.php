<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use Auth;
use App\School;
use App\Role;
use App\Grade;
use App\User;
use App\Subject;
use App\Student;
use App\Attendance;
use App\Address;
use App\Exam;
use Input;
use Carbon\Carbon;
use DB;

class GlobalComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view) {
		
		$view ->with('schools', School::orderBy('school', 'asc') -> get());

		if (Auth::check()) {
			
			//Dashboard Academic Graph: Grade drop down list
		
			foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
				$value = $v;
			}
			
			$view->with('schoolId', $value);   //sharing of school id across views
			
			$view ->with('gradelists', DB::table('grades')
						->where( 'school_id', '=', $value)
						->get());
			
			$gradelists = DB::table('grades')->where( 'school_id', '=', $value)->get();
						
						
			//Auth User School 
			
			$schools = School::find($value);
			
			//Student: All Student page - Dashboard page
			$view ->with('students', $schools->students->flatten()->toArray());		
					

			//Staff: All Staff page- Classroom page
   			$view ->with('staffs', $schools->users->flatten()->toArray());
			
			
			
			//All Subject lists from database
			
			$view->with('subjectDB', Subject::orderBy('subject', 'asc')->get());
			
			
			//Subject: Create Exam Page- Create page
			$subjectlists = array();
			$examlists = array();
			foreach($gradelists as $k=>$grade){
				$subjectlists[] =	Grade::find($grade->id)->subjects->flatten()->toArray();
				$examlists[] = Grade::find($grade->id)->exams->flatten()->toArray();		
			}
			
			$view->with('subjectlists', $subjectlists);  //gives an array of all subjects of all grades of a school
			$view->with('examlists', $examlists);       //gives an array of exams of all subjects of a grade of a school
			
			
			
			
			
			//User: Teacher list and their exams
			$users = User::find(2);
			$subjectUser123 = $users->subjects->lists('subject', 'id')->toArray();
			$examlistUser = array();
			foreach($subjectUser123 as $k=>$v){
				$examsUser[] = Exam::find($k)->toArray();
			}
			$view->with('examsUser', $examsUser);
		
		
			
			//Auth::User Data
			
			$addressesAU = Auth::user()->addresses->toArray();
			
			foreach($addressesAU as $k =>$addressesAuth){
				$addressesAuthUser = $addressesAuth;
				$view->with('addressAU', $addressesAuthUser);
			}
			
			
			
			
		
		
		
		}
	}

}
