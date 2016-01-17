<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradeusers', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();	
        });
		
		Schema::table('gradeusers', function (Blueprint $table) {
		    $table->integer('grade_id')->unsigned();
			$table->foreign('grade_id')->references('id')->on('grades');	
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('school_id')->unsigned();
			$table->foreign('school_id')->references('id')->on('schools');
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
    	Schema::dropIfExists('gradeusers');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
