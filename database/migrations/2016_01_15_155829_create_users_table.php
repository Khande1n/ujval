<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
			$table->string('role');
			$table->date('stf_bday');
			$table->string('gender');
			$table->string('stf_guardian1');
			$table->bigInteger('stf_contact1');
			$table->bigInteger('stf_contact2')->nullable();
			$table->string('stf_add1')->nullable();
			$table->string('stf_add2')->nullable();
			$table->string('stf_street')->nullable();
			$table->string('city')->default('Gurgaon');
			$table->string('state')->default('Haryana');
			$table->string('country')->default('India');
			$table->string('stf_pincode');
            $table->timestamps();
		});
					
		    Schema::table('users', function (Blueprint $table) {
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
    	Schema::dropIfExists('users');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
