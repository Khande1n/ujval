<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
			$table->string('staff_name');
			$table->date('bday_id');
			$table->integer('gender_name_id');
			$table->integer('contact_1_id');
			$table->integer('add_line_1_id');
			$table->integer('role_name_id');
			$table->integer('email_id');
			$table->integer('grade_name_id');
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
        Schema::drop('staff');
    }
}
