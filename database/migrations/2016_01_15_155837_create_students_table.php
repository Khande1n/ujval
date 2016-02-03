<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
			$table->string('rollNumber');
			$table->string('student')->index();
			$table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
			$table->date('bday');
			$table->string('gender');
			$table->string('guardian1');
			$table->string('parentemail');
			$table->timestamps();
        });
		


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	Schema::dropIfExists('students');
		Schema::dropIfExists('grade_student');
		Schema::dropIfExists('school_student');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
