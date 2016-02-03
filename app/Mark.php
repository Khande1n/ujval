<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
    protected $fillable = ['obt_marks'];


	/**
     * Get all of the marks of the student.
     */
    public function students()
    {
        return $this->belongsTo('App\Student');
    }
	
	/**
     * Get all of the owning marks of the exam.
     */
    public function exams()
    {
        return $this->belongsTo('App\Exam');
    }
	
	
}