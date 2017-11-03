<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLodgingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lodging_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lodging')->nullable();
            $table->integer('id_room_type')->nullable();
            $table->decimal('agent_rate')->default(0);
            $table->decimal('publish_rate')->default(0);
            $table->decimal('fee')->default(0);
            $table->integer('capacity')->default(0);
            $table->boolean('is_include_breakfast')->default(0);
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
        Schema::dropIfExists('lodging_details');
    }
}
