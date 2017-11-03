<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_attractions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->integer('id_destination')->nullable();
            $table->string('image', 100)->nullable();
            $table->decimal('agent_rate')->default(0);
            $table->decimal('publish_rate')->default(0);
            $table->decimal('fee')->default(0);
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
        Schema::dropIfExists('destination_attractions');
    }
}
