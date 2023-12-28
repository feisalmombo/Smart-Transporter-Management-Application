<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddsNewDrivers extends Model
{
    public function vehicles()
    {
        return $this->belongsToMany(AddsNewVehicles::class, 'driver_vehicles');
    }
}
