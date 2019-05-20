<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
    protected $table = "delivery_location";

    protected $fillable = [
        'location'
    ];
}
