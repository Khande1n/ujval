<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mark;

class Mark extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marks';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['obt_marks', 'student_id', 'exam_id'];

	
	/**
     * Marks belongs to a exam.
     */
    public function exams()
    {
        return $this->belongsToMany('App\Exam');
    }
	
		
	/**
     * Marks belongs to a student.
     */
    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

}