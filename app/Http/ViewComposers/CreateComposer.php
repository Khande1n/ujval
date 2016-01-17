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

class CreateComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view) {
		

		if (Auth::check()) {

			 //CREATE

			
			 $view -> with('schoolId', Auth::user() -> school_id);
 			
			 $view -> with('roles', Role::where('school_id', Auth::user() -> school_id) 
										 -> orderBy('role_name', 'asc') 
										 -> get());
						
			
		}
	}

}
