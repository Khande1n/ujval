<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grades';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['grade', 'grade_section', 'school_id'];

		
	/**
     * School belongs many staffs.
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'gradeable');
    }
	
		
	/**
     * School belongs many students.
     */
    public function students()
    {
        return $this->morphedByMany('App\Student',  'gradeable');
    }
	
		
	/**
     * School belongs many students.
     */
    public function subjects()
    {
        return $this->morphedByMany('App\Subject',  'gradeable');
    }
	
		
	/**
     * School belongs many students.
     */
    public function exams()
    {
        return $this->morphedByMany('App\Exam',  'gradeable');
    }
	
	
    /**
     * Get all of the user's attendances.
     */
    public function attendances()
    {
        return $this->morphMany('App\Attendance', 'present');
    }
	

	/**
     * A grade belongs to one school.
     */
    public function schools()
    {
        return $this->belongsTo('App\School');
    }
		
	
// 	
	// /**
     // * A grade has many subjects.
     // */
    // public function subjects()
    // {
        // return $this->belongsToMany('App\Subject')->withTimestamps();
    // }

	
	// /**
     // * A grade belongs to many users.
     // */
    // public function users()
    // {
        // return $this->belongsToMany('App\User')->withTimestamps();
    // }
// 
// 		
	// /**
     // * A grade has many users.
     // */
    // public function students()
    // {
        // return $this->belongsToMany('App\Student')->withTimestamps();
    // }
	
}
