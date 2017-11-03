<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('address')->nullable();
            $table->integer('id_province')->nullable();
            $table->integer('id_regencies')->nullable();
            $table->integer('region_province')->nullable();
            $table->integer('region_regencies')->nullable();
            $table->enum('gender', ['man', 'women'])->default('man');
            $table->string('image_url_reference', 256)->nullable();
            $table->string('image_path', 256)->nullable();
            $table->string('phone_1', 15)->nullable();
            $table->string('phone_2', 15)->nullable();
            $table->enum('type_of_id', ['ktp', 'sim', 'paspor'])->default('ktp');
            $table->string('number_of_id', 15)->nullable();
            $table->text('talent')->nullable();
            $table->text('language')->nullable();
            $table->integer('rating')->default(0);
            $table->integer('age')->default(0);
            $table->text('additional_service')->nullable();
            $table->decimal('agent_rate')->default(0);
            $table->decimal('publish_rate')->default(0);
            $table->decimal('fee')->default(0);
            $table->integer('capacity')->default(0);
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
        Schema::dropIfExists('guides');
    }
}
