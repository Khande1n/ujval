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
			
		return response()->view('principal/dashboard');
	
	}
		
	/**
     * Display a listing of the resource.
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
			->join('grades', 'grade_id', '=', 'grades.id')
    		->where('attendance', '>=', $range)
			->where('school_id', Auth::user()->school_id)
    		->groupBy('date')
    		->orderBy('date', 'ASC')
    		->get([
      			DB::raw('Date(attendance) as date'),
      			DB::raw('COUNT(*) as value')
    	]);
    
        return $stats;
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentAttendance()
    {
    	$nowTime = Carbon::now()->toFormattedDateString();
   		 $days = Input::get('days', 7);
		 $Idstudent = Input::get('Idstudent');
	
    	$range = Carbon::now()->subDays($days);

		$stats = DB::table('attendances')
 	 		->join('students', 'student_id', '=', 'students.id')
			->where('attendance', '>=', $range)
			->where('student_id', $Idstudent)
    		->groupBy('date')
    		->orderBy('date', 'ASC')
    		->get([
      			DB::raw('Date(attendance) as date'),
      			DB::raw('COUNT(*) as value')
    	]);
    
        return $stats;
    }
	
	 	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staffAttendance()
    {
    	$nowTime = Carbon::now()->toFormattedDateString();
   		 $days = Input::get('days', 7);
		 $Idstaff = Input::get('Idstaff');
	
    	$range = Carbon::now()->subDays($days);

		$stats = DB::table('attendances')
 	 		->join('users', 'user_id', '=', 'users.id')
			->where('attendance', '>=', $range)
			->where('user_id', $Idstaff)
    		->groupBy('date')
    		->orderBy('date', 'ASC')
    		->get([
      			DB::raw('Date(attendance) as date'),
      			DB::raw('COUNT(*) as value')
    	]);
    
        return $stats;
    }	
		
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardDropDown()
    {
        $gra_id = Input::get('gra_id');
		
		$subjectdropdown = DB::table('subjects')
					->where('grade_id', $gra_id)
					->orderBy('subject', 'asc')
                	->get();
				
		$jsonSubjects = json_encode($subjectdropdown);

   		return $jsonSubjects;
    }
	
		

		
	/**
     * Display a listing of the resource.
	 * 
     * @return \Illuminate\Http\Response
     */
    public function studentMarks()
    {
    
   		$examId = Input::get('examId');
		$Idstudent = Input::get('Idstudent');
	
		$studentMarks = DB::table('marks')
				->join('students', 'student_id', '=', 'students.id')
				->join('grades', 'grade_id', '=', 'grades.id')
				->join('exams', 'exam_id', '=', 'exams.id')
				->where('exam_id', '=', $examId)
				->where('student_id', '=', $Idstudent)
				->groupBy('exam_id')
				->orderBy('obt_marks', 'ASC')
				->get([
					DB::raw('exam as mark'),
					DB::raw('obt_marks as value')
				]);
    
	
        return $studentMarks;
    }
	

		
	/**
     * Display a listing of the resource.
	 * 
     * @return \Illuminate\Http\Response
     */
    public function staffMarks()
    {
    
   		$examId = Input::get('examId');
		$Idstaff = Input::get('Idstaff');
		
		$staffMarks = DB::table('marks')
				->join('exams', 'exam_id', '=', 'exams.id')
				->join('subjects', 'subject_id', '=', 'subjects.id') 
				->join('gradeusers', 'subjects.grade_id', '=', 'gradeusers.grade_id')
				->join('users', 'user_id', '=', 'users.id')
				->select('user_id', 'name','subjects.grade_id','exam','subject','subject_id','exam_id' )
				->where('exam_id', '=', $examId)
				->where('user_id', '=', $Idstaff)
				->groupBy('obt_marks')
				->orderBy('obt_marks', 'ASC')
				->get([
					DB::raw('obt_marks as mark'),
					DB::raw('Count(*) as value')
				]);

        	return $staffMarks;
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
        $student = Student::findOrFail($id);
		
		return view('dashboard.show',compact('student'));
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
