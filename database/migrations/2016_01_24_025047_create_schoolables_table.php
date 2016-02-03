<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolables', function (Blueprint $table) {
           	$table->integer('school_id');
        	$table->integer('schoolable_id');
			$table->string('schoolable_type');
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
    	Schema::dropIfExists('schoolables');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');	 
    }
}
