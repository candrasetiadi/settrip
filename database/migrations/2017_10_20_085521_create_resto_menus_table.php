<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resto_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_resto');            
            $table->enum('type', ['food', 'beverages', 'packages']);
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('images')->nullable();
            $table->decimal('agent_rate')->default(0);
            $table->decimal('publish_rate')->default(0);
            $table->decimal('fee')->default(0);
            $table->boolean('is_recommended')->nullable();
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
        Schema::dropIfExists('resto_menus');
    }
}
