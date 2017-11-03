<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLodgingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lodgings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_type')->nullable();
            $table->string('name', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('number_of_rooms', 4)->nullable();
            $table->integer('id_province')->nullable();
            $table->integer('id_regencies')->nullable();
            $table->string('phone_1', 15)->nullable();
            $table->string('phone_2', 15)->nullable();
            $table->string('location_coordinate', 45)->nullable();
            $table->boolean('is_gathering');
            $table->text('public_facility')->nullable();
            $table->text('room_facility')->nullable();
            $table->integer('rating')->nullable();
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
        Schema::dropIfExists('lodgings');
    }
}
