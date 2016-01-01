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
			$table->string('student');
			$table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
			$table->date('bday');
			$table->integer('gender');
			$table->string('guardian1');
			$table->string('guardian2')->nullable();
			$table->string('parentemail');
			$table->integer('contact11')->notnull();
			$table->integer('contact12')->nullable();
			$table->string('std_add1');
			$table->string('std_add2')->nullable();
			$table->string('std_street');
			$table->string('std_pincode');
			$table->timestamps();
        });
		
		    Schema::table('students', function (Blueprint $table) {
			$table->integer('grade_id')->unsigned();
			$table->foreign('grade_id')->references('id')->on('grades');
			
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
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
