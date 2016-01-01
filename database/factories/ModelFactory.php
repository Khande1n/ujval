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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

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
		'grade' => $faker->numberBetween($min = 1, $max = 12),
		'grade_section' => $faker->randomLetter,
		'school_id' => $faker->numberBetween($min = 1, $max = 20)
	];
});


$factory->define('App\Subject', function (Faker\Generator $faker) {
	return [
		'subject' => $faker->word,
		'grade_id' => $faker->numberBetween($min = 1, $max = 15)
	];
});


$factory->define('App\Exam', function (Faker\Generator $faker) {
	return [
		'exam' => $faker->fileExtension,
		'exam_date' => $faker->date,
		'exam_duration' => $faker->time,
		'max_marks' => $faker->numberBetween($min = 50, $max = 100),
		'pass_marks' => $faker->numberBetween($min = 30, $max = 35),
		'subject_id' => $faker->numberBetween($min = 1, $max = 15)
	];
});


$factory->define('App\Mark', function (Faker\Generator $faker) {
	return [
		'obt_marks' => $faker->numberBetween($min = 1, $max = 95),
		'exam_id' => $faker->numberBetween($min = 1, $max = 15),
	];
});
  

$factory->define('App\Staff', function (Faker\Generator $faker) {
	return [
		'staff' => $faker->name,
  		'stf_bday' => $faker->date,
  		'gender' => $faker->numberBetween($min = 0, $max = 1),
  		'email' => $faker->safeemail,
  		'stf_contact1' => $faker->phoneNumber,
  		'role' => $faker->title,
  		'stf_add1' => $faker->buildingNumber,
		'stf_add2' => $faker->streetName,
		'stf_street' => $faker->streetAddress,
		'stf_pincode' => $faker->postcode,
		// 'subject_id' => $faker->numberBetween($min = 1, $max = 20),
	];
});


$factory->define('App\Student', function (Faker\Generator $faker) {
	return [
		'student' => $faker->name,
        'bday' => $faker->date,
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'email' => $faker->safeemail,
        'contact11' => $faker->phoneNumber,
        'guardian1' => $faker->name,
        'guardian2' => $faker->name,
        'parentemail' => $faker->safeemail,
        'std_add1' => $faker->buildingNumber,
		'std_add2' => $faker->streetName,
		'std_street' => $faker->streetAddress,
		'std_pincode' => $faker->postcode,
		'grade_id' => $faker->numberBetween($min = 1, $max = 20),
	];
});


$factory->define('App\Attendance', function (Faker\Generator $faker) {
	return [
		'attendance' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
		'student_id' => $faker->numberBetween($min = 1, $max = 25)
	];
});
