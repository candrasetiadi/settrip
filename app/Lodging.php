<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'id_province',
        'id_regencies',
        'phone_1',
        'phone_2',
        'id_type',
        'room_activity',
        'public_facility',
        'number_of_rooms',
        'is_gathering',
        'location_coordinate',
        'rating'
    ];
}
