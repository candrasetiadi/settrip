<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    protected $fillable = [
        'name',
        'id_resto_category',
        'email',
        'address',
        'description',
        'id_province',
        'id_regencies',
        'phone_1',
        'phone_2',
        'open_hour',
        'close_hour',
        'maximum_person',
        'tags',
        'images',
        'rating',
        'location_coordinate'
    ];

    public function trip()
    {
        return $this->belongsTo('App\Trip');
    }
}
