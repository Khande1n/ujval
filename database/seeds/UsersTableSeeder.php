<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\School::class, 50)->create();
		factory(App\Grade::class, 50)->create();
		factory(App\Subject::class, 50)->create();
		factory(App\Exam::class, 50)->create();
		factory(App\Mark::class, 50)->create();
		factory(App\User::class, 50)->create();
        factory(App\Student::class, 50)->create();
		factory(App\Attendance::class, 50)->create();
		
    }
}
