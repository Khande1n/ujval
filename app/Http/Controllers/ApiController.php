<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Subject;
use App\Exam;
use App\Grade;
use App\Attendance;
use App\Student;
use DB;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardDropDown()
    {
        $gra_id = Input::get('gra_id');
		
		$subjects = Subject::where('grade_id', '=', $gra_id)
				->orderBy('subject', 'asc')
                ->get();

		  
		$jsonSubjects = json_encode($subjects);

   		return $jsonSubjects;
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examDropDown()
    {
        $sub_id = Input::get('sub_id');
		
		$exams = Exam::where('subject_id', '=', $sub_id)
				->orderBy('exam', 'asc')
                ->get();

		  
		$jsonExams = json_encode($exams);

   		return $jsonExams;
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function marksAnalysis()
    {
		// $exa_id = Input::get('exam_id');	
		// $gra_id = Input::get('gra_id');
		// $sub_id = Input::get('sub_id');
		
		$marks = DB::table('marks')
			->join('exams', 'exam_id', '=', 'exams.id')
			->join('subjects', 'subject_id', '=', 'subjects.id')
			->join('grades', 'grade_id', '=', 'grades.id')
			->join('schools', 'school_id', '=', 'schools.id')	
			// ->where('school_id', '=', 1)
			->where('grade_id', '=', 9)
			->where('subject_id', '=', 13)
			->where('exam_id', '=', 6)
			->groupBy('obt_marks')
			->orderBy('obt_marks', 'ASC')
			->get([
				DB::raw('obt_marks as mark'),
				DB::raw('Count(*) as value')
			]);
			
		
		return $marks;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
