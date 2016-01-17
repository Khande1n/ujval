<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Student;

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
    protected $fillable = ['student', 'rollNumber', 'email', 'password', 'bday', 'gender', 'password_confirmation', 'guardian1', 'guardian2', 'parentemail', 'contact11', 'contact12', 'std_add1', 'std_add2', 'std_street', 'std_pincode', 'grade_id'];
	
	
	/**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
		
	
	/**
     * Students belongs to a grade.
     */
    public function grades()
    {
        return $this->belongsTo('App\Grade');
    }
	
		
	/**
     * Get the the attendances of the student.
     */
    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
	
	/**
     * Get the the marks of the student.
     */
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }
}
