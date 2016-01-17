<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade;

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
     * A student has one address.
     */
    public function schools()
    {
        return $this->belongsToMany('App\School');
    }
	
	
	/**
     * A grade has many subjects.
     */
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
	
	/**
     * A grade has many students.
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }

}
