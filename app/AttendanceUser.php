<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceUser extends Model
{
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendanceusers';
	
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attendance', 'user_id'];
	
	
	/**
     * Get the staff with the attendance.
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
