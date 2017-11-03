<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'id_province',
        'id_regencies',
        'region_province',
        'region_regencies',
        'gender',
        'image_url_reference',
        'image_path',
        'phone_1',
        'phone_2',
        'type_of_id',
        'number_of_id',
        'talent',
        'language',
        'rating',
        'age',
        'additional_service',
        'price',
        'capacity',
    ];
}
