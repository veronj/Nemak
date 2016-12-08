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
            $table->string('x_position');
            $table->string('y_position');
            $table->integer('techno');
            $table->integer('men');
            $table->integer('lasers');
            $table->integer('ships');
            $table->integer('user_id');
            $table->rememberToken();
            $table->timestamps();

        });

//        Schema::table('commandants', function (Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });

        DB::table('commandants')->insert([
            ['name' => 'Burseig', 'x_position' => '00', 'y_position' => '00', 'techno' => '270', 'men' => 27000, 'lasers' => 20000, 'ships' => 300, 'user_id' => 1],
            ['name' => 'Balthazar', 'x_position' => '01', 'y_position' => '01', 'techno' => '270', 'men' => 17000, 'lasers' => 20000, 'ships' => 300, 'user_id' => 2]
        ]);

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
