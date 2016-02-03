<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradeables', function (Blueprint $table) {
           	$table->integer('grade_id');
        	$table->integer('gradeable_id');
			$table->string('gradeable_type');
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
    	Schema::dropIfExists('gradeables');
    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');	 
    }
}
