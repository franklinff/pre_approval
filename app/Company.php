<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Company extends Model
{
    protected $table = "company";

    protected $fillable = [
        'company_name',
        'logo_path',
        'address','pan','gstin_uin'
    ];


    public static function validate($request){

        $validatedata = Validator::make($request->input(), [
            'company_name' => 'required',
            'gstin_uin' => 'required',
            'pan' => 'required',
            'address' => 'required',
            'company_logo' => 'required'
        ]);
        return $validatedata;

    }

}
