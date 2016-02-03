<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
			$table->string('add1');
			$table->string('add2')->nullable();
			$table->string('street');
			$table->string('city')->default('Gurgaon');
			$table->string('state')->default('Haryana');
			$table->string('country')->default('India');
			$table->string('pincode');
			$table->string('guardian2')->nullable();
			$table->bigInteger('contact11')->default('9000000009');
			$table->bigInteger('contact12')->nullable();
			$table->integer('addressable_id');
			$table->string('addressable_type');
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
        Schema::drop('addresses');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
