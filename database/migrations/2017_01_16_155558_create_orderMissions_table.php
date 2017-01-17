<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderMissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turn_id');
            $table->integer('commandant_id');
            $table->integer('star_id');
            $table->string('type');
            $table->integer('ships');
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
        Schema::dropIfExists('orderMissions');
    }
}
