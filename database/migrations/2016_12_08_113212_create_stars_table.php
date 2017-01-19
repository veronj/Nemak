<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('x_position');
            $table->integer('y_position');
            $table->integer('population');
            $table->integer('men');
            $table->integer('lasers');
            $table->integer('commandant_id');
            $table->string('type');
            $table->string('status');
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
        Schema::dropIfExists('stars');
       // Schema::dropForeign(['commandant_id']);
    }
}
