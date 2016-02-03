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
    	factory(App\School::class, 3)->create()->each(function($u) {
        	// $u->students()->attach(factory(App\Student::class)->create());
        	// $u->users()->attach(factory(App\User::class)->create());
			// $u->addresses()->save(factory(App\Address::class)->create());
        });
		 
		factory(App\Role::class, 5)->create()->each(function($u) {
        	// $u->users()->attach(factory(App\User::class)->create());
        });
		 
		factory(App\Grade::class, 20)->create()->each(function($u) {
			// $u->users()->attach(factory(App\User::class)->create());
			// $u->students()->attach(factory(App\Student::class)->create());
			// // $u->exams()->attach(factory(App\Exam::class)->create());
			// $u->attendances()->save(factory(App\Attendance::class)->create());
		});
		 
		factory(App\User::class, 50)->create()->each(function($u) {
        	// $u->subjects()->attach(factory(App\Subject::class)->create());
			// $u->attendances()->save(factory(App\Attendance::class)->create());
			// $u->addresses()->save(factory(App\Address::class)->create());
			// $u->schools()->save(factory(App\School::class)->create());
			// $u->roles()->save(factory(App\Role::class)->create());
			// $u->grades()->save(factory(App\Grade::class)->create());
			// $u->schools()->attach(factory(App\School::class)->create());
        	// $u->roles()->attach(factory(App\Role::class)->create());
        	// $u->grades()->attach(factory(App\Grade::class)->create());
		});
		 
		factory(App\Student::class, 100)->create()->each(function($u) {
			// $u->attendances()->save(factory(App\Attendance::class)->create());
			// $u->addresses()->save(factory(App\Address::class)->create());
        	// $u->marks()->save(factory(App\Mark::class)->create());
			// $u->schools()->save(factory(App\School::class)->create());
			// $u->grades()->save(factory(App\Grade::class)->create());
			// $u->grades()->attach(factory(App\Grade::class)->create());
			// $u->marks()->attach(factory(App\Mark::class)->create());
			
   		 });
		
		factory(App\Subject::class, 20)->create();
			// $u->exams()->save(factory(App\Exam::class)->create());
			// $u->grades()->attach(factory(App\Grade::class)->create());
        	// $u->users()->attach(factory(App\User::class)->create());
			// $u->grades()->save(factory(App\Grade::class)->create());
			// $u->users()->save(factory(App\User::class)->create());
   		
		 
		// factory(App\Exam::class, 40)->create()->each(function($u) {
			// // $u->marks()->save(factory(App\Mark::class)->create());
		// });
			
		
		factory(App\Mark::class, 400)->create()->each(function($u) {
			
			// $u->students()->save(factory(App\Student::class)->create());
		});
		
		factory(App\Attendance::class, 300)->create();
		 
		 
		factory(App\Address::class, 100)->create();
		
    }
}
