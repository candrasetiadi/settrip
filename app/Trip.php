<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'address',
        'id_province',
        'id_regencies',
        'phone_1',
        'phone_2',
        'hotel_room_total',
        'hotel_rating',
        'resto_type',
        'transportation_unit_total',
        'location_coordinate',
        'remark'
    ];

    public function hotel()
    {
        return $this->hasMany('App\Hotel');
    }

    public function resto()
    {
        return $this->hasMany('App\Resto');
    }

    public function restoCategory()
    {
        return $this->hasMany('App\RestoCategory');
    }

    public function transportation()
    {
        return $this->hasMany('App\Transportation');
    }
}
