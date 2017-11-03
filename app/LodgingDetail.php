<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LodgingDetail extends Model
{
    protected $fillable = [
        'name',
        'id_lodging',
        'id_room_type',
        'is_include_breakfast',
        'price',
        'capacity'
    ];
}
