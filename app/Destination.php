<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    // protected $table = 'destinations';
    protected $fillable = [
        'name',
        'email',
        'address',
        'description',
        'id_province',
        'id_regencies',
        'phone_1',
        'phone_2',
        'category',
        'type',
        'activity',
        'public_facility',
        'minimum_time',
        'time_for_come',
        'open_hour',
        'close_hour',
        'rating',
        'location_coordinate',
        'ticket_local_agent_rate',
        'ticket_local_publish_rate',
        'ticket_local_fee',
        'ticket_foreign_agent_rate',
        'ticket_foreign_publish_rate',
        'ticket_foreign_fee',
        'ticket_student_agent_rate',
        'ticket_student_publish_rate',
        'ticket_student_fee',
        'ticket_car_agent_rate',
        'ticket_car_publish_rate',
        'ticket_car_fee',
        'ticket_bike_agent_rate',
        'ticket_bike_publish_rate',
        'ticket_bike_fee',
        'ticket_bus_agent_rate',
        'ticket_bus_publish_rate',
        'ticket_bus_fee',
        'ticket_group_agent_rate',
        'ticket_group_publish_rate',
        'ticket_group_fee',
        'ticket_group_capacity'
    ];
}
