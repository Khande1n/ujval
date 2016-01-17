<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateStaffRequest;
use Illuminate\Http\Request;
use Session;
use App\User;
use DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$staffs = User::paginate(10);

   		$count =  DB::table('users')
   					->where('school_id', Auth::user()->school_id)->count();

  		if (session()->has('message')){
      		Session::flash('noResults', 'Sorry, we found 0 results');
   		}
		
   		return view('staff.index', compact('staffs', 'count'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('principal.create#staff-tab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStaffRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
			
  		$staff = User::create
  		([
  		'name'         => ucwords($request->name),
  		'stf_bday'     => $request->stf_bday,
  		'gender'       => $request->gender,
  		'email'        => $request->email,
  		'stf_contact1' => $request->stf_contact1,
  		'role'         => ucwords($request->role),
  		'stf_add1'     => ucwords($request->stf_add1),
		'stf_add2'     => ucwords($request->stf_add2),
		'stf_street'   => ucwords($request->stf_street),
		'stf_pincode'  => $request->stf_pincode,
		'password'     => bcrypt($request->password),
		'school_id'    => $request->school_id,
		]);
		
		return redirect('principal/create#staff-tab')->withInput();
       		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$staffData = User::findOrFail($id);

		return view('staff.show', compact('staffData'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$staffData = User::findOrFail($id);
		return view('staff.edit', compact('staffData'));
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
			'name' => 'required|string',
			'stf_guardian1' => 'required|string',
			'email' => 'required|email',
			'stf_contact1' => 'required|integer|min:1000000000|max:9999999999',
			'stf_contact2' => 'integer|max:9999999999',
			'stf_pincode' => 'required|integer',
		 ]);

		$staffData = User::findOrFail($id);
		
		$staffData -> update([
			'name'           => ucwords($request->name),
			'email'          => $request->email,
			'stf_bday'       => $request->stf_bday,
			'role'           => ucwords($request->role),
			'stf_guardian1'  => ucwords($request->stf_guardian1),
			'stf_contact1'   => $request->stf_contact1,
			'stf_contact2'   => $request->stf_contact2,
			'stf_add1'       => ucwords($request->stf_add1),
			'stf_add2'       => ucwords($request->stf_add2),
			'stf_street'     => ucwords($request->stf_street),
			'stf_pincode'    => $request->stf_pincode,
		]);
		

		return Redirect::route('staff.show', ['staff' => $staffData]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		User::destroy($id);
		return Redirect::route('staff.show');
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
        	'name' => 'required|string',
      	]);

      	$searchterm = $request->name;
		
        $staffs = DB::table('users');
		
        $results = $staffs->where('name', 'LIKE', '%'. $searchterm .'%')->get();
             
		

      	if (count($results) > 0){
        	$count = count($results);
			$chartData = $chart->chartDataFromAllRecords();  
        	return view('staff.resultsindex', compact('results', 'count', 'chartData'));
      	}

        return Redirect::route('staff.index')->with('message', ['Sorry, no results!']);
    }
}
