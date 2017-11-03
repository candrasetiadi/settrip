<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_destination')->nullable();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price')->nullable();
            $table->boolean('is_available');
            $table->string('image_url_reference', 256)->nullable();
            $table->string('image_path', 256)->nullable();
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
        Schema::dropIfExists('attractions');
    }
}
