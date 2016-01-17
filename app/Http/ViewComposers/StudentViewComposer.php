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

class StudentViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view) 
	{
		
		if (Auth::check()) {
			
			$view -> with('examlists', DB::table('exams')
										->join('subjects', 'subject_id', '=', 'subjects.id')
										->join('grades', 'grade_id', '=', 'grades.id')
										->where('school_id', Auth::user()->school_id)
										->select('exams.id as id','exam', 'subject','grade_id')
										->orderBy('exam', 'asc')
										->get());
								
			
								
		}
	}

}
