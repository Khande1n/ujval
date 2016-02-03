<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateStudentRequest;
use Session;
use App\Student;
use App\Attendance;
use App\Address;
use App\Grade;
use App\School;
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
		foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
				$value = $v;
		}
		
   		$countStudent =  School::where('id', '=', $value)->students->count();

  		if (session()->has('message')){
      		Session::flash('noResults', 'Sorry, we found 0 results');
   		}
		
   		return view('student.index', compact('countStudent'));
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
			]);
		
		$address = Address::create(['contact11'=>$request->contact11]);
		$student->addresses()->save($address);
		
		
		foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
				$value = $v;
			}
		$school = School::find($value);
		$grade = Grade::find($request->grade_id);
		
		
		$student->schools()->attach($school);
		$student->grades()->attach($grade);
		
		
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
		$studentAdd = $studentData->addresses->flatten()->toArray();
		
		
		$studentGradeId = $studentData->grades->lists('id')->flatten()->toArray();
		foreach($studentGradeId as $key => $values){
			$gradeId = $values;
		}
		
		$studentGrades = Grade::find($gradeId);
		$examlists = $studentGrades->exams->flatten()->toArray();
		
		return view('student.show', compact('studentData', 'examlists', 'studentAdd'));
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
		$studentAdds = $studentData->addresses->flatten()->toArray();
		
		foreach($studentAdds as $key => $value){
			$studentAdd = $value;
		}
		
		$addressData = Address::findOrFail($studentAdd['id']);
		
		return view('student.edit', compact('studentData', 'studentAdd', 'addressData'));
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
			'student' => 'string',
			'email' => 'email',
			'parentemail' => 'email',
		 ]);

		$studentData = Student::findOrFail($id);
		$studentAdds = $studentData->addresses->flatten()->toArray();
		
		foreach($studentAdds as $key => $value){
			$studentAdd = $value;
		} 
		
		$addressData = Address::findOrFail($studentAdd['id']);
		
		$studentData -> update([
			'student'     => ucwords($request->student),
			'email'       => $request->email,
			'parentemail' => $request->parentemail,
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
