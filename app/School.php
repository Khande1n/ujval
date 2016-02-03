<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['school'];	
	
	
	/**
     * School belongs many staffs.
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'schoolable');
    }
	
		
	/**
     * School belongs many students.
     */
    public function students()
    {
        return $this->morphedByMany('App\Student',  'schoolable');
    }
	
	
	/**
     * School has many grades.
     */
    public function grades()
    {
        return $this->hasMany('App\Grade');
    }
	
	
	/**
     * Get all of the student's address.
     */
    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
	
		
	/**
     * School has many through subjects.
     */
    public function subjects()
    {
        return $this->hasManyThrough('App\Subject');
    }
}
