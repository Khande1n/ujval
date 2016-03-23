<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
			$table->string('exam')->index(); 
			$table->datetime('exam_start');
			$table->datetime('exam_end');
			$table->integer('max_marks');
			$table->integer('pass_marks');
            $table->float('weightage');
            $table->timestamps();
        });
		
		Schema::table('exams', function (Blueprint $table) {
			$table->integer('subject_id')->unsigned()->index();
			$table->foreign('subject_id')->references('id')->on('subjects');
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
    	Schema::dropIfExists('exams');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
