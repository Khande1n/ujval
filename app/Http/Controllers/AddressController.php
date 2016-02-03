<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Student;
use App\Address;


class AddressController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
		$this -> validate($request, [
			'contact11' => 'integer|min:1000000000|max:9999999999',
			'contact12' => 'integer|max:9999999999',
			'std_pincode' => 'integer',
		 ]);

		$studentData = Student::findOrFail($id);
		$studentAdds = $studentData->addresses->flatten()->toArray();
		
		foreach($studentAdds as $key => $value){
			$studentAdd = $value;
		} 
		
		$addressData = Address::findOrFail($studentAdd['id']);
		
		$addressData -> update([
			'contact11'   => $request->contact11,
			'contact12'   => $request->contact12,
			'add1'    	  => ucwords($request->add1),
			'add2'    	  => ucwords($request->add2),
			'street'  => ucwords($request->street),
			'pincode' => $request->pincode,
		]);
		
		return Redirect::route('student.show', ['student' => $addressData]);
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
