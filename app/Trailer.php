<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    public function vehicles()
    {
        return $this->belongsToMany(TrailerVehicle::class, 'trailer_vehicles');
    }
}
