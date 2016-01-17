<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
			$table->string('school');
			$table->bigInteger('sch_contact1')->default('9000000009');
			$table->bigInteger('sch_contact2')->nullable();
			$table->string('sch_add1')->nullable();
			$table->string('sch_add2')->nullable();
			$table->string('sch_street')->nullable();
			$table->string('sch_pincode')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('country')->default('India');
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
    	Schema::dropIfExists('schools');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');	 
    }
}