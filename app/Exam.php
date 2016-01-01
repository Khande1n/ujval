<?php

namespace App;

use App\Exam;

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
    protected $fillable = ['exam', 'exam_date', 'exam_duration', 'max_marks', 'pass_marks', 'subject_id'];
	
		
	/**
     * Exam belongs to a subject.
     */
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
	
	
	/**
     * Exam has many marks.
     */
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }
		
	
}
