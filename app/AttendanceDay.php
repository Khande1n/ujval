<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceDay extends Model
{
	protected $table = 'attendance_days';	
    protected $fillable = ['grade_id','date'];

    //
}
