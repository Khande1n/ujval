<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Staff;
use App\Exam;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        Student::truncate();
		Staff::truncate();
		Exam::truncate();

        factory(Student::class, 10)->create();
		factory(Staff::class, 10)->create();
		factory(Exam::class, 10)->create();
		
        Model::reguard();
    }
}
