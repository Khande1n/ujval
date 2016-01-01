<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
			$table->string('guardian_1_name')->unique();
			$table->string('guardian_2_name')->nullable();
			$table->integer('gender_name_id');
			$table->integer('contact_1_id');
			$table->integer('add_line_1_id');
			$table->integer('role_name_id');
			$table->integer('email_id');
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
        Schema::drop('guardians');
    }
}
