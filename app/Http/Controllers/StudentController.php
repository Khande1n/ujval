<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateStudentRequest;
use Session;
use App\Student;
use DB;

class StudentController extends Controller
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
        return view('principal.create#student-tab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $student = Student::create
        ([
        'student' => $request->student,
        'bday' => $request->bday,
        'gender' => $request->gender,
        'email' => $request->email,
        'contact11' => $request->contact11,
        'guardian1' => $request->guardian1,
        'guardian2' => $request->guardian2,
        'parentemail' => $request->parentemail,
        'std_add1' => $request->std_add1,
		'std_add2' => $request->std_add2,
		'std_street' => $request->std_street,
		'std_pincode' => $request->std_pincode
        ]);
		
		return redirect('principal/create#student-tab')->withInput();
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
