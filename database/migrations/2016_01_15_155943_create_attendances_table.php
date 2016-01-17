<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
			$table->date('attendance');
            $table->timestamps();
        });
			
		    Schema::table('attendances', function (Blueprint $table) {
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
    	Schema::dropIfExists('attendances');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 
    }
}
