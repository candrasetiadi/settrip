<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_transportation_type')->nullable();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->enum('necessary', ['dropin', 'pickup', 'halfday', 'fullday']);
            $table->string('brand', 100)->nullable();
            $table->integer('seat_capacity')->nullable();
            $table->integer('door_amount')->nullable();
            $table->integer('bag_capacity')->nullable();
            $table->text('facility')->nullable();
            $table->string('production_year')->nullable();
            $table->decimal('price')->nullable();
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
        Schema::dropIfExists('transportations');
    }
}
