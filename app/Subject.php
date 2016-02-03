<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject'];
		
		
	/**
     * Get all the subjects of the grades.
     */
    public function grades()
    {
        return $this->morphToMany('App\Grade', 'gradeable');
    }
	
	/**
     * Get all the marks of the subject.
     */
    public function marks()
    {
        return $this->hasManyThrough('App\Mark', 'App\Exam');
    }
			
		
	/**
     * Get all the tutors of the subject.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
			
	/**
     * Subject has many exam.
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

	
}
