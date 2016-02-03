<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use Carbon\Carbon;
use DB;
use Auth;

class AttendanceComposer {

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
