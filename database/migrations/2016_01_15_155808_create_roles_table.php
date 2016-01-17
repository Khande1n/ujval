<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
			$table->string('role_name');
            $table->timestamps();
        });
		
		Schema::table('roles', function (Blueprint $table) {
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
    	Schema::dropIfExists('roles');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}