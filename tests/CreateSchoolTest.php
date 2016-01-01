<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\School;

class CreateSchoolTest extends TestCase
{
	use DatabaseTransactions;
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSchoolFactory()
    {
    	$schools = factory('App\School', 50)->create();
		
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
