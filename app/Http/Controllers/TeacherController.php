<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateStaffRequest;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use App\School;
use App\Subject;
use App\Address;
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
		foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
				$value = $v;
		}
		
		$schools = School::find($value);
   		$staffs =  $schools->users->flatten()->toArray();
	
   		return view('staff.index', compact('staffs'));
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
	 * 
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
		$staff = User::create
  		([
  		'name'         => ucwords($request->name),
  		'bday'     => $request->bday,
  		'gender'       => $request->gender,
  		'email'        => $request->email,
  		'password'     => bcrypt($request->password),
		]);
		
		$address = Address::create(['contact11'=>$request->contact11]);
		$staff->addresses()->save($address);
		
		
		foreach(Auth::user()->schools()->lists('school_id')->toArray() as $k => $v){
				$value = $v;
			}
		$school = School::find($value);
		$staff->schools()->attach($school);
		
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
		
		$staffAddress = $staffData->addresses->toArray();

		return view('staff.show', compact('staffData', 'staffAddress'));
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
		
		$staffAddresses = $staffData->addresses->toArray();
		
		foreach($staffAddresses as $key => $value){
			$staffAddress = $value;
		}
		
		$addressStaff = Address::findOrFail($staffAddress['id']);
		
		return view('staff.edit', compact('staffData', 'addressStaff'));
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
    	$staffData = User::findOrFail($id);
		
		if(isset($request->name)){ 
			$staffData->update([
				'name' => $request->name,
				'email' => $request->email,
				'bday' => $request->bday,
			]);
		
		}
		
		$staffAddresses = $staffData->addresses->flatten()->toArray();
		foreach($staffAddresses as $key => $value){
			$staffAddress = $value;
		}
		
		$addressData = Address::findOrFail($staffAddress['id']);
		$addressData->update([
			'contact11' => $request->contact11,
			'contact12' => $request->contact12,
			'add1' => $request->add1,
			'add2' => $request->add2,
			'street' => $request->street,
			'pincode' => $request->pincode
		]);
		
		
		return Redirect::route('staff.show', ['staff' => $staffData]);
	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignSubject(Request $request, $id)
    {
    	$staffData = User::findOrFail($request->name);
		
		foreach($request->subjectCreate as $k=>$v){
			$subjects = Subject::find($v);
			$staffData->subjects()->attach($subjects);
		}
		
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
