<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class Staff extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['staff_name'];
		
		
	/**
     * A student has many guardian.
     */
    public function addresses()
    {
        return $this->hasOne('App\Address');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function birthdays()
    {
        return $this->hasOne('App\Birthday');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function contacts()
    {
        return $this->hasOne('App\Contact');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function genders()
    {
        return $this->hasOne('App\Gender');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function grades()
    {
        return $this->belongsTo('App\Grade');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function users()
    {
        return $this->hasOne('App\User');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function marks()
    {
        return $this->hasMany('App\Marks');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function roles()
    {
        return $this->hasOne('App\Role');
    }
	
		
	/**
     * A student has many guardian.
     */
    public function schools()
    {
        return $this->belongsTo('App\School');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }
		
		
	/**
     * A student has many guardian.
     */
    public function subjects()
    {
        return $this->belongsTo('App\Subject');
    }
	
		
	/**
     * A student has many guardian.
     */
    public function exams()
    {
        return $this->belongsTo('App\Exam');
    }
		

}
