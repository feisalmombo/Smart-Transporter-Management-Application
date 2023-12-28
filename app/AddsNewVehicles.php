<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddsNewVehicles extends Model
{
    public function drivers()
    {
        return $this->belongsToMany(AddsNewDrivers::class, 'driver_vehicles');
    }


    public function trailers()
    {
        return $this->belongsToMany(TrailerVehicle::class, 'trailer_vehicles');
    }
}
