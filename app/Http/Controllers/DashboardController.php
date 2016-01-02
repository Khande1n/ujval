<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Charthelpers\ChartDashboard;
use Carbon\Carbon;
use App\Attendance;
use App\Student;
use App\Subject;
use App\Grade;
use Session;
use Input;
use DB;
use Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
	 * 
	 * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$grades = Grade::orderBy('grade', 'asc')->get();
		
		$students = DB::table('students')
				->join('grades', 'grade_id','=','grades.id')
				->select(['students.id','student','email', 
					'bday', 'gender', 'guardian1', 
					'contact11', 'parentemail', 'grade'])
				->where('school_id', '2')
				->orderBy('student', 'asc')
				->get();
				
				
		$user = Auth::check();				
    	$nowTime = Carbon::now()->toFormattedDateString();
		$name = Session::get('name');
		
		

		return response()->view('principal/dashboard', compact('nowTime', 'grades','students', 'user'));
	
	}
		
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
			->where('student_id', 1)
    		->groupBy('date')
    		->orderBy('date', 'ASC')
    		->get([
      			DB::raw('Date(attendance) as date'),
      			DB::raw('COUNT(*) as value')
    	]);
    
        return $stats;
    }
	 	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	}
	
	
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentDetail = Student::findOrFail($id);
		
		return view('principal.show', compact('studentDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
		
		return view('principal.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
