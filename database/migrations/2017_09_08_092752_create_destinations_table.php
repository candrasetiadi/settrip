<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->integer('id_province')->nullable();
            $table->integer('id_regencies')->nullable();
            $table->string('phone_1', 15)->nullable();
            $table->string('phone_2', 15)->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('activity')->nullable();
            $table->string('public_facility')->nullable();
            $table->integer('minimum_time')->nullable();
            $table->integer('maximum_time')->nullable();
            $table->string('time_for_come')->nullable();
            $table->string('open_hour')->nullable();
            $table->string('close_hour')->nullable();
            $table->string('rating')->nullable();
            $table->text('facility')->nullable();
            $table->text('equipment')->nullable();
            $table->decimal('ticket_local_agent_rate')->default(0);
            $table->decimal('ticket_local_publish_rate')->default(0);
            $table->decimal('ticket_local_fee')->default(0);
            $table->decimal('ticket_foreign_agent_rate')->default(0);
            $table->decimal('ticket_foreign_publish_rate')->default(0);
            $table->decimal('ticket_foreign_fee')->default(0);
            $table->decimal('ticket_student_agent_rate')->default(0);
            $table->decimal('ticket_student_publish_rate')->default(0);
            $table->decimal('ticket_student_fee')->default(0);
            $table->decimal('ticket_car_agent_rate')->default(0);
            $table->decimal('ticket_car_publish_rate')->default(0);
            $table->decimal('ticket_car_fee')->default(0);
            $table->decimal('ticket_bike_agent_rate')->default(0);
            $table->decimal('ticket_bike_publish_rate')->default(0);
            $table->decimal('ticket_bike_fee')->default(0);
            $table->decimal('ticket_bus_agent_rate')->default(0);
            $table->decimal('ticket_bus_publish_rate')->default(0);
            $table->decimal('ticket_bus_fee')->default(0);
            $table->decimal('ticket_group_agent_rate')->default(0);
            $table->decimal('ticket_group_publish_rate')->default(0);
            $table->decimal('ticket_group_fee')->default(0);
            $table->integer('ticket_group_capacity')->default(0);
            $table->string('location_coordinate', 45)->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('destinations');
    }
}
