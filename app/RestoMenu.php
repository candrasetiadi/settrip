<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestoMenu extends Model
{
    protected $fillable = [
        'name',
        'id_resto',
        'type',
        'name',
        'description',
        'images',
        'agent_rate',
        'publish_rate',
        'fee',
        'is_recommended'
    ];
}
