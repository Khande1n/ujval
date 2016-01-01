<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        
		$exam  = Exam::create([
		'exam' => $request->exam,
		'exam_date' => $request->exam_date,
		'exam_duration' => $request->exam_duration,
		'max_marks' => $request->max_marks,
		'pass_marks' => $request->pass_marks,
		]);

		return redirect('principal/create')->withInput();
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
