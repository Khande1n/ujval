<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use Auth;
use App\Exam;
use App\Grade;
use DB;

class ViewAuthUserComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view) 
	{
		
		if (Auth::check()) {
			
			
						
		}
	}

}
