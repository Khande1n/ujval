<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateStaffRequest;
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
        //
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
  		'name' => $request->name,
  		'stf_bday' => $request->stf_bday,
  		'gender' => $request->gender,
  		'email' => $request->email,
  		'stf_contact1' => $request->stf_contact1,
  		'role' => $request->role,
  		'stf_add1' => $request->stf_add1,
		'stf_add2' => $request->stf_add2,
		'stf_street' => $request->stf_street,
		'stf_pincode' => $request->stf_pincode,
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
