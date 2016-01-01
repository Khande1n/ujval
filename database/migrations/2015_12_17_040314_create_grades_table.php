<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
			$table->string('grade');
			$table->string('grade_section');
			$table->timestamps();	
        });
		
		    Schema::table('grades', function (Blueprint $table) {	
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
    	Schema::dropIfExists('grades');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
