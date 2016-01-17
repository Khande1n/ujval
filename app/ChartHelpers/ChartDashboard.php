<?php

namespace App\ChartHelpers;

use DB;
use Attendance;
use Exam;
use Grade;
use School;
use Staff;
use Student;
use Subject;

class ChartDashboard
{
	
	/**
     * The .
     *
     * 
     */
    public function chartAttendanceRecord()
	{
		$count = DB::table('attendances')
			->whereBetween('attendance', ['$date1', '$date2'])
			->distinct()
			->count('student_id');
			
		return $count;
	}
}	