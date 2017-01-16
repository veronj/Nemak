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


//        Schema::table('stars', function (Blueprint $table) {
//            $table->foreign('commandant_id')->references('id')->on('commandants')->onDelete('cascade');
//        });


        DB::table('stars')->insert([
            ['name' => 'Abork', 'x_position' => '00', 'y_position' => '00', 'population' => '270', 'men' => 17000, 'lasers' => 4000, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Bezig', 'x_position' => '00', 'y_position' => '01', 'population' => '470', 'men' => 20000, 'lasers' => 6000, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Cefug', 'x_position' => '00', 'y_position' => '02', 'population' => '670', 'men' => 13000, 'lasers' => 7000, 'commandant_id' => 1, 'type' => 'Industrie', 'status' => 'Paix'],
            ['name' => 'Dabak', 'x_position' => '00', 'y_position' => '03', 'population' => '210', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 2, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Erpok', 'x_position' => '00', 'y_position' => '04', 'population' => '210', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 2, 'type' => 'Commerce', 'status' => 'Paix'],

            ['name' => 'Labek', 'x_position' => '01', 'y_position' => '00', 'population' => '110', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 2, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Sokur', 'x_position' => '01', 'y_position' => '01', 'population' => '710', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Industrie', 'status' => 'Paix'],
            ['name' => 'Zedir', 'x_position' => '01', 'y_position' => '02', 'population' => '310', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Industrie', 'status' => 'Paix'],
            ['name' => 'Altab', 'x_position' => '01', 'y_position' => '03', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Rosig', 'x_position' => '02', 'y_position' => '00', 'population' => '90', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 2, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Razab', 'x_position' => '02', 'y_position' => '01', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Xerok', 'x_position' => '02', 'y_position' => '02', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 2, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Mader', 'x_position' => '02', 'y_position' => '03', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Kaleb', 'x_position' => '03', 'y_position' => '00', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Belto', 'x_position' => '03', 'y_position' => '01', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 2, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Tefak', 'x_position' => '03', 'y_position' => '02', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Rohiq', 'x_position' => '03', 'y_position' => '03', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Staro', 'x_position' => '04', 'y_position' => '00', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Ribuk', 'x_position' => '04', 'y_position' => '01', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Kapoh', 'x_position' => '04', 'y_position' => '02', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ['name' => 'Kazab', 'x_position' => '04', 'y_position' => '03', 'population' => '220', 'men' => 9000, 'lasers' => 760, 'commandant_id' => 1, 'type' => 'Commerce', 'status' => 'Paix'],
            ]);

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
