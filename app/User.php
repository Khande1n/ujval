<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','password_confirmation', 
    						'bday', 'gender', 'guardian1'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



	public function getIsAdminAttribute()
	{
    return true;
	}

	
	/**
     * Get all of the student's address.
     */
    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
		
	
    /**
     * Get all of the user's attendances.
     */
    public function attendances()
    {
        return $this->morphMany('App\Attendance', 'present');
    }	
	
	
	/**
     * Get the user of the school.
     */
    public function schools()
    {
        return $this->morphToMany('App\School', 'schoolable');
    }
	
	
	/**
     * User belongs to subjects.
     */
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
	
		
	/**
     * User has many through exams.
     */
    public function exams()
    {
        return $this->hasManyThrough('App\Exam');
    }
	
		
	/**
     * User belongs to grades.
     */
    public function grades()
    {
        return $this->morphToMany('App\Grade', 'gradeable');
    }
	
			
	/**
     * Get the roles of the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
		
	
}