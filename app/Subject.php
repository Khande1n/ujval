<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

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
    protected $fillable = ['subject', 'grade_id'];
		
		
	/**
     * A student has many guardian.
     */
    public function grades()
    {
        return $this->belongsToMany('App\Grade');
    }
	
				
	/**
     * Subject has many exam.
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }
		
}
