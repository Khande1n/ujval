<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('obt_marks');		
			$table->timestamps();
        });
		
		Schema::table('marks', function (Blueprint $table) {
            $table->integer('exam_id')->unsigned();
			$table->foreign('exam_id')->references('id')->on('exams');
			$table->integer('student_id')->unsigned();
			$table->foreign('student_id')->references('id')->on('students');
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
    	Schema::dropIfExists('marks');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
