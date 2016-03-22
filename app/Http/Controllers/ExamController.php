<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateExamRequest;
use Session;
use App\Exam;
use DB;

class ExamController extends Controller
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
        return view('principal.create#exam-tab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateExamfRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExamRequest $request)
    {
    	
        foreach($request->subject_id as $k=>$v){
			$exams  = Exam::create([
				'exam'        => strtoupper($request->exam),
				'exam_start'  => $request->exam_start,
				'exam_end'    => $request->exam_end,
				'max_marks'   => $request->max_marks,
				'pass_marks'  => $request->pass_marks,
				'subject_id'  => $v,
			]);
			
			$exams->grades()->sync($request->input('grade_id'));
		}

		return redirect('principal/create#exam-tab')->withInput();
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
    	$exams = Exam::find($request->exam);
        $exams->grades()->sync($request->input('grade_id'));
		$marks = Marks::find();

		return redirect('principal/create#exam-tab')->withInput();
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
