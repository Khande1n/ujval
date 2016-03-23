<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exams';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['exam', 'exam_start', 'exam_end', 'max_marks', 'pass_marks', 'subject_id','weightage'];
	
			
	/**
     * Exam belongs to grades.
     */
    public function grades()
    {
        return $this->morphToMany('App\Grade', 'gradeable');
    }
	
		
	/**
     * Exam belongs to a subject.
     */
    public function subjects()
    {
        return $this->belongsTo('App\Subject');
    }
	
    /**
     * Get all of the exam's marks.
     */
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }		
	
}
