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
    	factory(App\School::class, 3)->create();
		factory(App\Grade::class, 20)->create();
		factory(App\User::class, 30)->create();
		factory(App\Student::class, 100)->create();
		factory(App\Subject::class, 20)->create();
		factory(App\Exam::class, 20)->create();
		factory(App\Mark::class, 100)->create();
		factory(App\Attendance::class, 500)->create();
		factory(App\Gradeuser::class, 50)->create();
		factory(App\AttendanceUser::class, 500)->create();
		
    }
}
