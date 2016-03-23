<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mark;
use App\Student;
use App\Exam;
use DB;
class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('principal.create#mark-tab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $marks = Mark::create
        ([	
        	'exam_id' =>Input::get('exam_id') ,
        	'student_id' => Input::get('student_id'),
        	'obt_marks' => Input::get('obt_marks')
        ]);
		
		$exams = Exam::find(Input::get('exam_id'));
		$students = Student::find(Input::get('student_id'));
		// print_r($exams);
  //       print_r($students);
		$marks->exams()->save($exams);
		$marks->students()->save($students);
		
		return "ok";
    }

    public function savemarks(){
        $exam_id = Input::get('exam_id') ;
        $student_id = Input::get('student_id');
        $obt_marks = Input::get('obt_marks');

        $marks = Mark::where('exam_id',$exam_id)->where('student_id',$student_id)->first();
        // print_r($marks);
        if($marks !=null){ 
            $marks->update(array('obt_marks'=>$obt_marks));            
        }
        else{
            $marks = new Mark();
            $marks->exam_id = $exam_id;
            $marks->student_id = $student_id ;
            $marks->obt_marks = $obt_marks;   
            $marks->save();
        }
        $response =  array('status' => 'success' );
        return json_encode($response);
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
