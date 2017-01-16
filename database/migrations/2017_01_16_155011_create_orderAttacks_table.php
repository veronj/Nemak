<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAttacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderAttacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turn_id');
            $table->integer('commandant_id');
            $table->integer('star_id');
            $table->string('type');
            $table->integer('men')->nullable();
            $table->integer('lasers')->nullable();
            $table->integer('robots')->nullable();
            $table->integer('missiles')->nullable();
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
        Schema::dropIfExists('orderAttacks');
    }
}
