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
use App\Mark;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentDropDown()
    {
        $gra_id = Input::get('gra_id');
        $sub_id = Input::get('sub');
        $exam_id = Input::get('exam');

        $studentdropdown = Grade::find($gra_id)->students->toArray();
        for($i=0;$i<sizeof($studentdropdown);$i++){
            if($mark = Mark::where('exam_id', $exam_id)->where('student_id', $studentdropdown[$i]['id'])->first()){
                $studentdropdown[$i]['mark'] =  $mark['obt_marks'];  
            }
            else
                $studentdropdown[$i]['mark'] =  ''; 
        } 
        $jsonStudents = json_encode($studentdropdown);
        return $jsonStudents;
    }

    public function studentDropDown2($gra_id)
    {
        // $gra_id = Input::get('gra_id');
        $studentdropdown = Grade::find($gra_id)->students->toArray();
        $jsonStudents = json_encode($studentdropdown);
        return $jsonStudents;
    }
    public function allmarks()
    {

    }
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function examAverageChart()
    {
        $exam_id = Input::get('exam_id');
		
		$examAvg = Exam::find($exam_id)->marks->avg('obt_marks');
		
				
		$jsonExamAvg = json_encode($examAvg);

   		return $jsonExamAvg;
    }	


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function marksAnalysis()
    {
		$examId = Input::get('examId', 6);	
		
		$marks = DB::table('marks')
			->where('exam_id', '=', $examId)
			->groupBy('obt_marks')
			->orderBy('obt_marks', 'ASC')
			->get([
				DB::raw('obt_marks as mark'),
				DB::raw('Count(*) as value')
			]);
			
		
		return $marks;
    }

}