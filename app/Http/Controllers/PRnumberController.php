<?php

namespace App\Http\Controllers;

use App\Company;
use App\DeliveryLocation;
use App\PRnumber;
use App\Vendor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Config;
use DB;

class PRnumberController extends Controller
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
    public function index(DataTables $datatables, Request $request){

        $columns = [
            ['data' => 'rownum','name' => 'rownum','title' => 'Sr No.','searchable' => false],
            ['data' => 'pr_no','name' => 'pr_no','title' => 'PR No.'],
            ['data' => 'company_name','name' => 'company_name','title' => 'Company'],
            ['data' => 'requested_by','name' => 'requested_by','title' => 'Requested By'],
            ['data' => 'material_req_company_department','name' => 'material_req_company_department','title' => 'Material Request Company Department'],
            ['data' => 'vendor_supplier_name','name' => 'vendor_supplier_name','title' => 'Vendor'],
            ['data' => 'edit_action','name' => 'edit_action','title' => 'Action','sortable'=>false]
        ];

        $pr_details = PRnumber::with('get_company_name','get_vendor_name')->get();

       // dd($pr_details->toArray());

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($pr_details)
                ->editColumn('rownum', function () {
                    static $i = 0;
                    $i++;
                    return $i;
                })
               ->editColumn('company_name', function ($pr_details) {
                    return $pr_details->get_company_name->company_name;
                })
                ->editColumn('requested_by', function ($pr_details) {
                    return $pr_details->requested_by;
                })
                ->editColumn('edit_action', function ($pr_details) {
                    return '<div style="display: flex"><a href="'. route('pr_number.edit',$pr_details->id).'" class="btn">Edit</a>
                            <a href="'. route('generate.purchase_order_pdf',$pr_details->id.'_pr').'" target="_blank" title="View PR Number" class="btn btn-primary btn-xs btn-rounded">View</a></div>';
                })
                ->editColumn('vendor_supplier_name', function ($pr_details) {
                    return $pr_details->get_vendor_name->vendor_name;
                })
                ->editColumn('pr_no', function ($pr_details) {
                    return $pr_details->pr_no;
                })
                ->editColumn('material_req_company_department', function ($pr_details) {
                    return $pr_details->material_req_company_department;
                })
                ->rawColumns(['rownum','pr_no','company_name','requested_by','material_req_company_department','vendor_supplier_name','edit_action'])
                ->make(true);
        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('pr_no.index', compact('html'));
    }

    protected function getParameters() {

        return [
            'serverSide' => true,
            'processing' => true,
            'ordering'   =>'isSorted',
            "pageLength" => \Config::get('commonConfig.list_num_of_records_per_page'),
            "filter" => [
                'class' => 'test_class'
            ]
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_details = Company::all();
        $delivery_locations = DeliveryLocation::all();
        $vendors = Vendor::all();
        $terms_of_deliveries = DB::table('terms_of_deliveries')->get();
        $last_pr_number = PRnumber::orderBy('id', 'DESC')->first();

        if(count($last_pr_number) == 0){
            $last_pr_number = new PRnumber;
            $last_pr_number->id = 1;
            $pr_number = str_pad($last_pr_number->id, 6, '0', STR_PAD_LEFT);/*mt_rand(10,100).time();*/
        }else{
            $pr_number = str_pad($last_pr_number->id+1, 6, '0', STR_PAD_LEFT);/*mt_rand(10,100).time();*/
        }

        return view('pr_no.add', compact('company_details', 'delivery_locations', 'vendors', 'pr_number','terms_of_deliveries'));
    }

    /*
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_fields = PRnumber::validate($request);

        if($validated_fields->fails()){
            $errors = $validated_fields->errors();
            $request->flash();
            return redirect()->route('pr_number.create')->withErrors($errors)->withInput();
        }else{
            $input = $request->all();
            unset($input['_token']);
            $pr_details = PRnumber::create($input);
            return redirect()->route('pr_items.show', $pr_details->id.'_pr');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('test');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_details = Company::all();
        $delivery_locations = DeliveryLocation::all();
        $vendors = Vendor::all();
        $terms_of_deliveries = DB::table('terms_of_deliveries')->get();

        $prnumber_data = PRnumber::select('*')->where('id',$id)->first();
        return view('pr_no.edit',compact('prnumber_data','company_details','delivery_locations','vendors','terms_of_deliveries'));
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
        $validated_fields = PRnumber::validate($request);

        if($validated_fields->fails()){
            $company_details = Company::all();
            $delivery_locations = DeliveryLocation::all();
            $vendors = Vendor::all();
            $prnumber_data = PRnumber::select('*')->where('id',$id)->first();
            $errors = $validated_fields->errors();
            $request->flash();
            return view('pr_no.edit',compact('prnumber_data','company_details','delivery_locations','vendors'))->withErrors($errors);
        }else{
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
            $updated_record = PRnumber::where('id',$id)->update($input_arr);
            return redirect()->route('pr_number.index');
        }
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
