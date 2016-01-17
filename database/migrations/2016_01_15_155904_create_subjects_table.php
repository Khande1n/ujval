<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
			$table->string('subject');
            $table->timestamps();
        });
		
		   	Schema::table('subjects', function (Blueprint $table) {
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
    	Schema::dropIfExists('subjects');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
