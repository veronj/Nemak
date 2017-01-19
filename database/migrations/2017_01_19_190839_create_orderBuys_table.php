<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderBuys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turn_id');
            $table->integer('commandant_id');
            $table->integer('men');
            $table->string('lasers');
            $table->integer('ships');
            $table->integer('robots');
            $table->integer('missiles');
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
        Schema::dropIfExists('orderBuys');
    }
}
