<?php

namespace App;

use App\RequestCustomer;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    // This show the relationship between Request items belongsTo Request customer

    public function requestcustomer()
    {
        return $this->belongsTo('App\RequestCustomer');
    }
}
