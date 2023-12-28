<?php

namespace App;

use App\RequestItem;

use Illuminate\Database\Eloquent\Model;

class RequestCustomer extends Model
{
    // This show the relationship between One Request have many requestItem

    public function requestItems()
    {
        return $this->hasMany('App\RequestItem', 'foreign_key', 'requestcustomer_id');
    }
}
