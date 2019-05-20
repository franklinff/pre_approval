<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = "vendor";

    protected $fillable = [
        'vendor_name','gstin_uin','pan','address'
    ];
}
