<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\PoNumber;
use Yajra\DataTables\DataTables;
use File;
use Storage;
use App\Company;
use App\DeliveryLocation;
use App\PRnumber;
use App\Vendor;
use DB;

class POnumberController extends Controller
{

    public function __construct()
    {
        $this->CommonController = new CommonController();
        $this->list_num_of_records_per_page = Config::get('commonConfig.list_num_of_records_per_page');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTables $datatables, Request $request)
    {
        $columns = [
            ['data' => 'rownum','name' => 'rownum','title' => 'Sr No.','searchable' => false],
            ['data' => 'requested_by','name' => 'requested_by','title' => 'Rquested By'],
            ['data' => 'po_no','name' => 'po_no','title' => 'PO no.'],
            ['data' => 'delivery_location','name' => 'delivery_location','title' => 'Delivery Location'],
            ['data' => 'vendor_supplier_name','name' => 'vendor_supplier_name','title' => 'Vendor/Supplier Name'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $po = PoNumber::with('get_company_name','get_vendor_name','get_deliverylocation_name')->orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($po)
                ->editColumn('rownum', function () {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('requested_by', function ($po) {
                    return $po->requested_by;
                })
                ->editColumn('po_no', function ($po) {
                    return $po->po_no   ;
                })
                ->editColumn('delivery_location', function ($po) {
                    return $po->get_deliverylocation_name->location;
                })
                ->editColumn('vendor_supplier_name', function ($po) {
                    return $po->get_vendor_name->vendor_name;
                })
                ->editColumn('actions', function ($po) {
                    return view('po_number.actions', compact('po'));
                })
                ->rawColumns(['rownum', 'requested_by', 'po_no', 'material_req_on_or_before', 'material_req_company_department', 'delivery_location', 'vendor_supplier_name', 'phone_no', 'address', 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('po_number.index', compact('html'));
    }


    protected function getParameters() {
        return [
            'serverSide' => true,
            'processing' => true,
            'ordering'   =>'isSorted',
            "pageLength" => $this->list_num_of_records_per_page,
            'responsive' => true,
            "filter" => [
                'class' => 'test_class'
            ]
        ];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_details = Company::all();
        $delivery_locations = DeliveryLocation::all();
        $vendors = Vendor::all();
        $terms_of_deliveries = DB::table('terms_of_deliveries')->get();
        $last_pr_number = POnumber::orderBy('id', 'DESC')->first();

        if(count($last_pr_number) == 0){
            $last_pr_number = new PRnumber;
            $last_pr_number->id = 1;
            $pr_number = str_pad($last_pr_number->id, 6, '0', STR_PAD_LEFT);/*mt_rand(10,100).time();*/
        }else{
            $pr_number = str_pad($last_pr_number->id+1, 6, '0', STR_PAD_LEFT);/*mt_rand(10,100).time();*/
        }

        return view('po_number.add', compact('company_details', 'delivery_locations', 'vendors', 'pr_number','terms_of_deliveries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $input = $request->all();
        unset($input['_token']);
        $po_details = PoNumber::create($input);
        return redirect()->route('pr_items.show', $po_details->id.'_po');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $po_data = POnumber::select('*')->where('id',$id)->first();
        //dd($po_data->toArray());
        $company_details = Company::all();
        $delivery_locations = DeliveryLocation::all();
        $vendors = Vendor::all();
        $terms_of_deliveries = DB::table('terms_of_deliveries')->get();
        return view('po_number.edit',compact('po_data','company_details','delivery_locations','vendors','terms_of_deliveries'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input_arr = array(
            'company_id' => $request->company_id,
            'requested_by' => $request->requested_by,
            'dor' => $request->dor,
            'material_req_on_or_before' => $request->material_req_on_or_before,
            'material_req_company_department' => $request->material_req_company_department,
            'delivery_location' => $request->delivery_location,
            'vendor_supplier_name' => $request->vendor_supplier_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'terms_of_delivery' => $request->terms_of_delivery
        );
        $updated_record = POnumber::where('id',$id)->update($input_arr);
        return redirect()->route('po_number.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
