<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PRnumber extends Model
{
    protected $table = "p_rnumbers";

    protected $fillable = [
        'company_id',
        'pr_no',
        'requested_by',
        'dor',
        'material_req_on_or_before',
        'material_req_company_department',
        'delivery_location',
        'vendor_supplier_name',
        'phone_no',
        'address',
        'terms_of_delivery'
    ];

    public function get_company_name()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
        //return $this->hasOne('App\Company', 'id','company_id' );
    }

    public function get_vendor_name(){
        return $this->belongsTo('App\Vendor', 'vendor_supplier_name', 'id');
        //return $this->hasOne('App\Vendor', 'id' , 'vendor_supplier_name');
    }

    public function get_deliverylocation_name(){
        return $this->belongsTo('App\DeliveryLocation', 'delivery_location', 'id');
        //return $this->hasOne('App\DeliveryLocation', 'id', 'delivery_location');
    }

    public function delivery_terms(){
        return $this->belongsTo('App\TermsOfDelivery', 'terms_of_delivery', 'id');
        //return $this->hasOne('App\TermsOfDelivery','id' , 'terms_of_delivery');
    }


    public static function validate($request){
        $validatedata = Validator::make($request->input(), [
            'company_id' => 'required',
            'pr_no' => 'required',
            'requested_by' => 'required',
            'dor' => 'required',
            'material_req_on_or_before' => 'required',
            'material_req_company_department' => 'required',
            'delivery_location' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'vendor_supplier_name' => 'required'
        ]);
        return $validatedata;
    }


}
