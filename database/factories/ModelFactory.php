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
		'sch_contact1' => $faker->phoneNumber,
		'sch_contact2' => $faker->phoneNumber,
		'sch_add1' => $faker->buildingNumber,
		'sch_add2' => $faker->streetName,
		'sch_street' => $faker->streetAddress,
		'sch_pincode' => $faker->postcode,
		'city' => $faker->city,
		'state' => $faker->state,
		'country' => $faker->country,
			
	];
});


$factory->define('App\Grade', function (Faker\Generator $faker) {
	return [
		'grade' => $faker->randomElement($array = array ('I','II','III','IV','V','VI','VII','VIII')),
		'grade_section' => $faker->randomElement($array = array ('A','B','C')),
		'school_id' => $faker->numberBetween($min = 1, $max = 3)
	];
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
													'Biology',
		)),
		'grade_id' => $faker->numberBetween($min = 1, $max = 20)
	];
});


$factory->define('App\Exam', function (Faker\Generator $faker) {
	return [
		'exam' => $faker->randomElement($array = array ('FA I','FA II','SA I', 'FA III', 'FA IV', 'SA II')),
		'exam_start' => $faker->date,
		'exam_end' => $faker->date,
		'max_marks' => $faker->numberBetween($min = 70, $max = 100),
		'pass_marks' => $faker->numberBetween($min = 30, $max = 35),
		'subject_id' => $faker->numberBetween($min = 1, $max = 20)
	];
});


$factory->define('App\Mark', function (Faker\Generator $faker) {
	return [
		'obt_marks' => $faker->numberBetween($min = 1, $max = 95),
		'exam_id' => $faker->numberBetween($min = 1, $max = 6),
		'student_id' => $faker->numberBetween($min = 1, $max = 50),
	];
});
  

$factory->define('App\User', function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
  		'stf_bday' => $faker->date,
  		'gender' => $faker->randomElement($array = array ('Male','Female')),
  		'email' => $faker->safeemail,
  		'stf_contact1' => $faker->phoneNumber,
  		'role' => $faker->randomElement($array = array ('Subject Teacher','Class Teacher', 'Manager')),
  		'stf_add1' => $faker->buildingNumber,
		'stf_add2' => $faker->streetName,
		'stf_street' => $faker->streetAddress,
		'city' => $faker->randomElement($array = array ('Gurgaon')),
		'state' => $faker->randomElement($array = array ('Haryana')),
		'country' => $faker->randomElement($array = array ('India')),
		'stf_pincode' => $faker->postcode,
		'school_id' => $faker->numberBetween($min = 1, $max = 3),
	];
});


$factory->define('App\Student', function (Faker\Generator $faker) {
	return [
		'student' => $faker->name,
        'bday' => $faker->date,
        'gender' => $faker->randomElement($array = array ('Male','Female')),
        'email' => $faker->safeemail,
        'contact11' => $faker->phoneNumber,
        'guardian1' => $faker->name,
        'guardian2' => $faker->name,
        'parentemail' => $faker->safeemail,
        'std_add1' => $faker->buildingNumber,
		'std_add2' => $faker->streetName,
		'std_street' => $faker->streetAddress,
		'city' => $faker->randomElement($array = array ('Gurgaon')),
		'state' => $faker->randomElement($array = array ('Haryana')),
		'country' => $faker->randomElement($array = array ('India')),
		'std_pincode' => $faker->postcode,
		'grade_id' => $faker->numberBetween($min = 1, $max = 10),
	];
});


$factory->define('App\Attendance', function (Faker\Generator $faker) {
	return [
		'attendance' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
		'student_id' => $faker->numberBetween($min = 1, $max = 50)
	];
});



$factory->define('App\Gradeuser', function (Faker\Generator $faker) {
	return [
		'grade_id' => $faker->numberBetween($min = 1, $max = 20),
		'user_id' => $faker->numberBetween($min = 1, $max = 20),
		'school_id' => $faker->numberBetween($min = 1, $max = 3),
	];
});

$factory->define('App\AttendanceUser', function (Faker\Generator $faker) {
	return [
		'attendance' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
		'user_id' => $faker->numberBetween($min = 1, $max = 20)
	];
});
