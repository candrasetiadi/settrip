<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
	protected $fillable = [
        'name',
        'description',
        'id_transportation_type',
        'necessary',
        'brand',
        'seat_capacity',
        'door_amount',
        'bag_capacity',
        'id_facility',
        'price',
        'production_year'
    ];

    //
    public function trip()
    {
        
    }
}
