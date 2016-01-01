<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Attendance;

class CreateAttendanceTest extends TestCase
{
	use DatabaseTransactions;
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAttendanceFactory()
    {
    	$attendances = factory('App\Attendance', 50)->create();
		
		dd($attendances);
		
		
         // $this->visit('principal/create#exam-tab')
            // ->select('FAIII','exam_name')
			// ->select('Social Science', 'sub_name_first')
			// // ->select('I', 'sub_name_second')
            // ->type('12/16/2009', 'exam_date')
			// ->type('100', 'max_marks')
            // ->press('Save')
			// ->seePageIs('principal/create');
    }
}
