<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendanceusers', function (Blueprint $table) {
            $table->increments('id');
			$table->date('attendance');
            $table->timestamps();
        });
			
		    Schema::table('attendanceusers', function (Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
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
    	Schema::dropIfExists('attendanceusers');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 
    }
}
