<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('x_position');
            $table->integer('y_position');
            $table->integer('techno');
            $table->integer('novars');
            $table->integer('minerals');
            $table->integer('men');
            $table->integer('lasers');
            $table->integer('ships');
            $table->integer('user_id');
            $table->rememberToken();
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
        Schema::dropIfExists('commandants');
       // Schema::dropForeign(['user_id']);
    }
}
