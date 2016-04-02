<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Student;
use App\User;
use App\Attendance;
use App\AttendanceUser;
use Auth;
use Redirect;
use DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
				$value = $v;
			}
		
		$attendances = Attendance::all();
		$attendanceStudents = $attendances->students->flatten()->toArray();
		$attendanceUsers = $attendances->users->flatten()->toArray();			
		$attendanceGrades = $attendances->grades->flatten()->toArray();
		
		
		return view('attendance.index', compact('attendanceStudents', 'attendanceUsers', 'attendanceGrades'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('principal.classroom#attendance-tab');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$attendanceStudent = Attendance::create([
			'attendance' 	=> $request -> attendance, 
			'student_id' 	=> $request -> student_id, 
		]);
		
		$attendanceUser = AttendanceUser::create([
			'attendance' 	=> $request -> attendance, 
			'user_id' 		=> $request -> user_id, 
		]);

		return redirect('principal/classroom#attendance-tab') -> withInput();
	}

	public function allAttendance(){
        $gra_id = Input::get('gra_id');
		$attendances = Attendance::all();
		$attendanceStudents = $attendances->students->flatten()->toArray();
	}
	
	public function saveAttendance(){
		// /api/student-dropdown?gra+id=' + gra_id+"&sub="+sub_id+"&exam="+exam_id
		echo 'sahil';
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$attendanceStudentData = Attendance::findOrFail($id);
		
		$attendanceUserData = AttendanceUser::findOrFail($id);
		
		return view('attendance.show', compact('attendanceStudentData', 'attendanceUserData'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$attendanceStudentData = Attendance::findOrFail($id);
		
		$attendanceUserData = AttendanceUser::findOrFail($id);
		
		return view('attendance.edit', compact('attendanceStudentData', 'attendanceUserData'));
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
		$this -> validate($request, [
			'attendance' => 'required|date',
			'student_id' => 'integer',
			'user_id' => 'integer',
		]);
		
		
		$attendanceStudentData = Attendance::findOrFail($id);
		
		$attendanceUserData = AttendanceUser::findOrFail($id);
		
		$attendanceStudentData -> update([
			'attendance'  => $request->date,
			'student_id'  => $request->student_id,
		]);
		
		$attendanceUserData -> update([
			'attendance'  => $request->date,
			'user_id'  => $request->user_id,
		]);
		

		return Redirect::route('attendance.show');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Attendance::destroy($id);
		
		// AttendanceUser::destroy($id);
		
		return Redirect::route('attendance.allAttendance');
	}

	/**
     * Search from Database.
     *
     * @param 
     * @return
     */
	public function search(Request $request)
    {
    	
	}
}
