<?php

namespace App\Http\Middleware;

use Closure;
use Input;
use Session;
use App\Staff;
use Auth;
use Illuminate\Contracts\Auth\Guard;



class ViewUserData
{
	/**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $userdata;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $userdata
     * @return void
     */
    public function __construct(Guard $userdata)
    {
        $this->userdata = $userdata;
    }
	
	
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	if (Auth::check()) {
    		if(Auth::user()){
    			if($request->ajax()) {
    				return response('Unathorized.', 401);
    			} else {
    				$token = Input::get("token");
					$user = Staff::get()->where('_token','=', 'token');
					return view('principal/profilePage', compact('user'));
    			}
    		}
        }
			
        return $next($request);
    }
}

