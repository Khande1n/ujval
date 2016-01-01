<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Exam;

class CreateExamTest extends TestCase
{
	use DatabaseTransactions;
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewCreateExamFactory()
    {
    	$exams = factory('App\Exam', 50)->create();
		
		// dd($exams);
		
		
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
