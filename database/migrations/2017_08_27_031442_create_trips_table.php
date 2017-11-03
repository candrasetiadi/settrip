<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['hotel', 'resto', 'transportation', 'tour']);
            $table->string('name', 100);
            $table->text('address');
            $table->string('id_province');
            $table->string('id_regencies');
            $table->string('phone_1', 15);
            $table->string('phone_2', 15);
            $table->string('email', 100);
            $table->string('hotel_room_total', 4);
            $table->string('hotel_rating', 1);
            $table->string('resto_type', 45);
            $table->string('transportation_unit_total', 4);
            $table->string('location_coordinate', 45);
            $table->text('remark');
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
        Schema::dropIfExists('trips');
    }
}
