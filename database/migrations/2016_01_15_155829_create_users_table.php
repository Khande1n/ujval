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
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
			$table->date('bday');
			$table->string('gender');
			$table->string('guardian1');
            $table->timestamps();
		});
					
					
				
		Schema::create('role_user', function (Blueprint $table) {
		    $table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');	
				
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
    	Schema::dropIfExists('users');
		Schema::dropIfExists('school_user');
		Schema::dropIfExists('role_user');
		Schema::dropIfExists('grade_user');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
