<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use App\User;
use DB;

class UserController extends Controller
{
	use ResetsPasswords;
	
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function showProfile(Request $request, $id)
    {
        $data = $request->session()->all();
		
    }

	/**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReseto(Request $request)
    {
        // Get the request parameters
		$email = $request->email;
		$password = $request->password;
		$passwordConfirmation = $request->password_confirmation;
		
		// Search for a user matching the email address
		$user = User::where('email', $email)->first();

		// Go ahead if a user matching that email was found
			if ( ! is_null($user))
				{
 			   // Check if the password and password confirmation match
 			   // NOTE: you can do additional validations here if needed
 				   if ($password == $passwordConfirmation)
  						 {
        					DB::table('users')
            					->where('email', $email)
            					->update(['password' => bcrypt($password)]);
    					 }
				}
		return redirect('/principal/dashboard');		
    }
	


	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
    }
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPassword = $request->new_password;
		$oldPassword = $request->old_password;
		DB::table('users')
				->where('$oldPassword', '=', 'password')
				->update(['password' => 'newPassword']);
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
