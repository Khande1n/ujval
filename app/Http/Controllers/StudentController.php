<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateStudentRequest;
use Session;
use App\Student;
use App\Attendance;
use Auth;
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
		$studentData = DB::table('students')
						->where('school_id', Auth::user()->school_id)
						->get();

   		$count =  DB::table('students')
   					->join('grades', 'grade_id', '=', 'grades.id') 
   					->where('school_id', Auth::user()->school_id)->count();

  		if (session()->has('message')){
      		Session::flash('noResults', 'Sorry, we found 0 results');
   		}
		
   		return view('student.index', compact('studentData', 'count'));
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
		$student = Student::create([
			'student'     	=> ucwords($request -> student), 
			'bday' 			=> $request -> bday, 
			'gender' 		=> $request -> gender, 
			'email' 		=> $request -> email, 
			'contact11' 	=> $request -> contact11, 
			'guardian1' 	=> ucwords($request -> guardian1), 
			'guardian2' 	=> ucwords($request -> guardian2), 
			'parentemail' 	=> $request -> parentemail, 
			'std_add1' 		=> ucwords($request -> std_add1), 
			'std_add2' 		=> ucwords($request -> std_add2), 
			'std_street' 	=> ucwords($request -> std_street), 
			'std_pincode' 	=> $request -> std_pincode, 
			'grade_id' 		=> $request -> grade_id, 
			'password' 		=> bcrypt($request -> password), ]);

		return redirect('principal/create#student-tab') -> withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) 
	{
		$studentData = Student::findOrFail($id);

		return view('student.show', compact('studentData'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) 
	{
		$studentData = Student::findOrFail($id);
		return view('student.edit', compact('studentData'));
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
			'student' => 'required|string',
			'email' => 'required|email',
			'parentemail' => 'required|email',
			'contact11' => 'required|integer|min:1000000000|max:9999999999',
			'contact12' => 'integer|max:9999999999',
			'std_pincode' => 'required|integer',
		 ]);

		$studentData = Student::findOrFail($id);
		
		$studentData -> update([
			'student'     => ucwords($request->student),
			'email'       => $request->email,
			'parentemail' => $request->parentemail,
			'contact11'   => $request->contact11,
			'contact12'   => $request->contact12,
			'std_add1'    => ucwords($request->std_add1),
			'std_add2'    => ucwords($request->std_add2),
			'std_street'  => ucwords($request->std_street),
			'std_pincode' => $request->std_pincode,
		]);
		

		return Redirect::route('student.show', ['student' => $studentData]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) 
	{
		Student::destroy($id);
		return Redirect::route('student.show');
	}
	
	/**
     * Search from Database.
     *
     * @param 
     * @return
     */
	public function search(Request $request, WidgetChart $chart)
    {
    	
	  	$this->validate($request, [
        	'student' => 'required|string',
      	]);

      	$searchterm = $request->student;
		
        $allstudents = DB::table('students');
		
        $results = $allstudents->where('student', 'LIKE', '%'. $searchterm .'%')->get();
             
		

      	if (count($results) > 0){
        	$count = count($results);
			$chartData = $chart->chartDataFromAllRecords();  
        	return view('student.resultsindex', compact('results', 'count', 'chartData'));
      	}

        return Redirect::route('student.index')->with('message', ['Sorry, no results!']);
    }
}
