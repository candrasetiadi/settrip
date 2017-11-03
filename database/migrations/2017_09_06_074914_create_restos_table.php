<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_resto_category');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->integer('id_province')->nullable();
            $table->integer('id_regencies')->nullable();
            $table->string('phone_1', 15)->nullable();
            $table->string('phone_2', 15)->nullable();
            $table->string('open_hour', 20)->nullable();
            $table->string('close_hour', 20)->nullable();
            $table->string('maximum_person', 3)->nullable();
            $table->string('rating', 2)->nullable();
            $table->string('tags', 100)->nullable();
            $table->string('images')->nullable();
            $table->string('location_coordinate', 45)->nullable();
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
        Schema::dropIfExists('resto');
    }
}
