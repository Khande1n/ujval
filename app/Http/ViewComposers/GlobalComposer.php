<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use Auth;
use App\Grade;
use App\Exam;
use App\School;
use App\Role;
use App\Subject;
use App\Student;
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
			
			$view ->with('marklists', DB::table('exams')
						->join('subjects', 'subject_id', '=', 'subjects.id')
						->join('grades', 'grade_id', '=', 'grades.id')
						->where('school_id', Auth::user()->school_id)
						->select('exams.id as exam_id', 'exam', 'subject', 'subject_id', 'grade', 'grade_section', 'grade_id')
						->orderBy('exam', 'asc')
						->get());
						
			
			$view ->with('gradelists', DB::table('subjects')
						->join('grades', 'grade_id', '=', 'grades.id')
						->where('school_id', Auth::user()->school_id)
						->get());
						
			
			$view ->with('grades', DB::table('grades')
						->where('school_id', Auth::user()->school_id)
						->get());
		
		
			$view -> with('staffs', DB::table('users') 
										-> where('school_id', Auth::user() -> school_id) 
										-> orderBy('name') 
										-> get());
			
			$view -> with('roles', Role::where('school_id', Auth::user() -> school_id) 
										-> orderBy('role_name', 'asc') 
										-> get());
										
					
			$view ->with('students', DB::table('students') 
						-> join('grades', 'grade_id', '=', 'grades.id') 
						-> select('students.*' , 'grades.grade')
						-> where('school_id', Auth::user() -> school_id) 
						-> orderBy('student') 
						-> get());
					
						
			$view ->with('teacherlists', DB::table('marks')
						->join('exams', 'exam_id', '=', 'exams.id')
						->join('subjects', 'subject_id', '=', 'subjects.id') 
						->join('gradeusers', 'subjects.grade_id', '=', 'gradeusers.grade_id')
						->join('users', 'user_id', '=', 'users.id')
						->select('user_id', 'name','subjects.grade_id','exam','subject','subject_id','exam_id' )
						->get());
// 
			// $view->with('trial', DB::table('marks')
				// ->join('students', 'student_id', '=', 'students.id')
				// ->join('grades', 'grade_id', '=', 'grades.id')
				// ->join('exams', 'exam_id', '=', 'exams.id')
				// ->select('obt_marks', 'exam_id','exam', 'student_id')
				// ->where('exam_id', 6)
				// ->where('student_id', 45)
				// ->get());
				
    
		}
	}

}
