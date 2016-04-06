<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateStudentRequest;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Student;
use App\User;
use App\Grade;
use App\Attendance;
use App\AttendanceUser;
use App\ApiController as API;
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

	public function allAttendance($gra_id){
 
		$students = app('App\Http\Controllers\ApiController')->studentDropDown2($gra_id);
		$students =  json_decode($students);
		// print_r(sizeof($students));
		$attendances = [];
		foreach ($students as $student) { 
	        $attendance = Attendance::where('present_id',$student->id)->get();
			$attendances[$student->id] = $attendance; 			 
		}
		return view('principal.attendances', compact('attendances','students'));
	}

	public function saveAttendance(){ 

		$student_id = Input::get('student_id');
		$attendance = Input::get('attendance');
		$dt = Carbon::now();
		$dt = $dt->toDateString();		
		$att = Attendance::where('present_id',$student_id)->where('created_at','LIKE',"%$dt%")->first();
		if(count($att)){
			Attendance::destroy($att->id);
			$data = array('status'=>'success',
						'response' => 'marked present'
					);
		}
		else{
			$attendanceStudent = Attendance::create([
				'attendance' 	=> $attendance,
				'present_id' 	=> $student_id,
				'present_type'	=> 'App\Student'		 
			]);			
			$data = array('status'=>'success',
						'response' => 'marked absent'
					);
		}
		return json_encode($data);
	}

	public function students($gra_id){
		$studentdropdown = Grade::find($gra_id)->students->toArray();
		$dt = Carbon::now();
		$dt = $dt->toDateString();
		foreach ($studentdropdown as $key => $student) {
			$att = Attendance::where('present_id',$student['id'])->where('created_at','LIKE',"%$dt%")->first();
			if(count($att)){
				$studentdropdown[$key]['attendance'] = $att->attendance;
			}
		}
        $jsonStudents = json_encode($studentdropdown);
        return $jsonStudents;
	}
}
