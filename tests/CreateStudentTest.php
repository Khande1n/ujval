<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Student;

class CreateStudentTest extends TestCase
{
	use DatabaseTransactions;
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStudentfactory()
    {
    	
		$students = factory('App\Student', 50)->create();
		
        // $this->visit('principal/create#student-tab')
            // ->type('nikhil', 'student_name')
			// ->type('12/16/2009', 'bday')
			// ->select('Female', 'gender_name')
            // ->type('hello2@in.com', 'email')
            // ->type('9090989834', 'contact_1')
			// ->type('jagdish', 'guardian_1_name')
			// ->type('jaya', 'guardian_2_name')
			// ->type('hello3@in.com', 'email')
			// ->select('XI', 'grade_name')
			// ->select('A', 'grade_section')
            // ->type('asddf', 'add_line_1')
			// ->type('fkdsjdkjk', 'add_line_2')
			// ->type('dfdsd', 'street')
            // ->type('334002', 'pincode')
			// ->type('Gurgaona', 'city')
			// ->type('Haryanaa', 'state')
			// ->type('India', 'country')
            // ->press('Save')
			// ->seePageIs('principal/create');
    }
}
