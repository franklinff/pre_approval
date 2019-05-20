<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoNumber extends Model
{
    protected $table = 'po_numbers';

    protected $fillable = [
        'company_id',
        'po_no',
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
    }

    public function get_vendor_name(){
        return $this->belongsTo('App\Vendor', 'vendor_supplier_name', 'id');
    }


    public function get_deliverylocation_name(){
        return $this->belongsTo('App\DeliveryLocation', 'delivery_location', 'id');
    }

    public function delivery_terms(){
        return $this->belongsTo('App\TermsOfDelivery', 'terms_of_delivery', 'id');
    }

}
