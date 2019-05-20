<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PRitems extends Model
{
    protected $table = "p_ritems";


    public static function validate($request){
        $validatedata = Validator::make($request->input(), [
            'date' => 'required',
            'material_description' => 'required',
            'purpose' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required'
        ]);
        return $validatedata;
    }

}
