<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Attendance;
use Carbon\Carbon;
use App\Attendance;
use App\Student;
use Session;
use Input;
use DB;

class ChartsController extends Controller
{
	
 /**
     * Display a listing of the resource.
	 * 
	 * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
   public function getApi()
    {
    	$nowTime = Carbon::now()->toFormattedDateString();
   		 $days = Input::get('days', 7);
	
    	$range = Carbon::now()->subDays($days);

		$stats = DB::table('attendances')
 	 		->join('students', 'student_id', '=', 'students.id')
    		->where('attendance', '>=', $range)
			->where('school_id', 1)
    		->groupBy('date')
    		->orderBy('date', 'ASC')
    		->get([
      			DB::raw('Date(attendance) as date'),
      			DB::raw('COUNT(*) as value')
    	]);
		
		$json = json_encode($stats);
    
    return $json;
  }
		
				
}