<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Student extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student', 'rollNumber', 'email', 'password', 'password_confirmation', 'bday', 'gender', 'guardian1', 'parentemail'];
	
	
	/**
     * Get all of the student's attendances.
     */
    public function attendances()
    {
        return $this->morphMany('App\Attendance', 'present');
    }

	
	/**
     * Get all of the student's address.
     */
    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
	
	
	/**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	
	/**
     * Students belongs to many schools.
     */
    public function schools()
    {
        return $this->morphToMany('App\School', 'schoolable');
    }
							
	
	/**
     * Students belongs to a grade.
     */
    public function grades()
    {
        return $this->morphToMany('App\Grade', 'gradeable');
    }
	
    /**
     * Get all of the student's marks.
     */
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }		

	
	/**
     * Student has many through exams.
     */
    public function exams()
    {
        return $this->hasManyThrough('App\Exam', 'App\Subject');
    }

}
