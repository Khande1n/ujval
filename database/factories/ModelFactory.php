<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


  // $factory->define(App\Widget::class, function (Faker\Generator $faker) {
      // return [
          // 'widget_name' => $faker->unique()->word,
// 
      // ];   
  // });


$factory->define('App\School', function (Faker\Generator $faker) {
	return [
		'school' => $faker->company,
		'board' => $faker->randomElement($array = array ('CBSE', 'RAJ')),
	];
});


$factory->define('App\Grade', function (Faker\Generator $faker) {
	$schools = App\School::all()->lists('id')->toArray();
	foreach(range(1,20) as $index){
	return [
		'grade' => $faker->randomElement($array = array ('I','II','III','IV','V','VI','VII','VIII')),
		'grade_section' => $faker->randomElement($array = array ('A','B','C')),
		'school_id' => $faker->randomElement($schools),
	];
	}
});



$factory->define('App\Subject', function (Faker\Generator $faker) {
	return [
		'subject' => $faker->randomElement($array = array (
													'Hindi',
													'English',
													'Mathematics',
													'Science',
													'Social Science',
													'Physics',
													'Chemistry',
													'Biology'))	];
	
});



$factory->define('App\Exam', function (Faker\Generator $faker) {
	
	return [
		'exam' => $faker->randomElement($array = array ('FA I','FA II','SA I', 'FA III', 'FA IV', 'SA II')),
		'exam_start' => $faker->date,
		'exam_end' => $faker->date,
		'max_marks' => $faker->numberBetween($min = 70, $max = 100),
		'pass_marks' => $faker->numberBetween($min = 30, $max = 35),
		// 'subject_id' => $faker->numberBetween($min = 1, $max = 40),
	];

});



$factory->define('App\Mark', function (Faker\Generator $faker) {
	return [
		'obt_marks' => $faker->numberBetween($min = 1, $max = 95),
		// 'exam_id' => $faker->numberBetween($min = 1, $max = 6),
		// 'student_id' => $faker->numberBetween($min = 1, $max = 50),
		
	];
});
  

$factory->define('App\User', function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'password' => Hash::make('nikhil'),
		'email' => $faker->safeemail,
		'bday' => $faker->date,
  		'gender' => $faker->randomElement($array = array ('Male','Female')),
  		'guardian1' => $faker->name,
	];
});


$factory->define('App\Student', function (Faker\Generator $faker) {
	return [
		'student' => $faker->name,
		'email' => $faker->safeemail,
        'bday' => $faker->date,
        'gender' => $faker->randomElement($array = array ('Male','Female')),
        'guardian1' => $faker->name,
        'parentemail' => $faker->safeemail,
        
	];
});


$factory->define('App\Attendance', function (Faker\Generator $faker) {
	return [
		'attendance' => $faker->randomElement($array = array ('P','A')),
	];
});


$factory->define('App\Address', function (Faker\Generator $faker) {
	return [
		'add1' => $faker->buildingNumber,
		'add2' => $faker->streetName,
		'street' => $faker->streetAddress,
		'city' => $faker->randomElement($array = array ('Gurgaon')),
		'state' => $faker->randomElement($array = array ('Haryana')),
		'country' => $faker->randomElement($array = array ('India')),
		'pincode' => $faker->postcode,
		'guardian2' => $faker->name,
        'contact11' => $faker->phonenumber,
        'contact12' => $faker -> phonenumber,
		// 'addressable_id' => $faker->numberBetween($min = 1, $max = 100),
		// 'addressable_type' => $faker->randomElement($array = array ('User','School','Student')),
	];
});

$factory->define('App\Role', function (Faker\Generator $faker) {
	return [
		'role_name' => $faker->randomElement($array = array ('Subject Teacher','Class Teacher', 'Manager', 'Principal')),
	];
});

