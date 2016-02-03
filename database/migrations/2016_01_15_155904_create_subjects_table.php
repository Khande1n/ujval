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
			$table->string('subject')->index();
            $table->timestamps();
        });
	
	
		Schema::create('subject_user', function (Blueprint $table) {
		    $table->integer('subject_id')->unsigned();
			$table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
				
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
    	Schema::dropIfExists('subjects');	
    	Schema::dropIfExists('grade_subject');
		Schema::dropIfExists('subject_user');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');	
    }
}
