<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationAttraction extends Model
{
   	protected $fillable = [
        'name',
        'description',
        'id_destination',
        'image',
        'agent_rate',
        'publish_rate',
        'fee',
    ];
}
