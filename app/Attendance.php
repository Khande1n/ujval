<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendances';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attendance', 'student_id'];
	
	
	/**
     * Get the student with the attendance.
     */
    public function students()
    {
        return $this->belongsTo('App\Student');
    }
	
		
	/**
     * Get the staff with the attendance.
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
}
