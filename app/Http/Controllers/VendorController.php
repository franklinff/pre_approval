<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Vendor;
use Config;
use File;
use Storage;

class VendorController extends Controller
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
            ['data' => 'vendor_name','name' => 'vendor_name','title' => 'Name'],
            ['data'=>'gstin_uin','name'=>'gstin_uin','title'=>'GSTIN/UIN'],
            ['data'=>'address','name'=>'address','title'=>'Address'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $vendor_details = Vendor::orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($vendor_details)
                ->setRowId(function ($vendor_details){
                    return 'row_'.$vendor_details->id;
                })
                ->editColumn('rownum', function ($vendor_details) {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('vendor_name', function ($vendor_details) {
                    return $vendor_details->vendor_name;
                })

                ->editColumn('gstin_uin', function ($vendor_details) {
                    return $vendor_details->gstin_uin;
                })

                ->editColumn('address', function ($vendor_details) {
                    return $vendor_details->address;
                })

                ->editColumn('actions', function ($vendor_details) {
                    return view('vendor.actions', compact('vendor_details'));
                })
                ->rawColumns(['rownum', 'vendor_name'/*, 'company_logo'*/, 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('vendor.index', compact('html'));
    }

    protected function getParameters() {
        return [
            'serverSide' => true,
            'processing' => true,
            'ordering'   =>'isSorted',
//            "order"=> [2, "desc" ],
            "pageLength" => $this->list_num_of_records_per_page,
            // 'fixedHeader' => [
            //     'header' => true,
            //     'footer' => true
            // ]
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
        return view('vendor.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $input_arr = array(
            'vendor_name' => $form_data['vendor_name'],
            'gstin_uin'   => $form_data['gstin_uin'],
            'address'     => $form_data['address'],
        );
        if(!empty($form_data['vendor_name'])){
            $inserted_record = Vendor::create($input_arr);
            return redirect()->route('vendor.index')->withMessage(['type'=>'success','text'=>'Vendor Added!']);
        }else{
            return redirect()->route('vendor.create')->with('error', 'Vendor Name is required.');
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
        $vendor_detail = Vendor::where('id', $id)->first();
        return view('vendor.edit', compact('vendor_detail'));
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
        $form_data = $request->all();
        $input_arr = array(
            'vendor_name' => $form_data['vendor_name'],
            'gstin_uin'   => $form_data['gstin_uin'],
            'address'     => $form_data['address'],
        );
        if(!empty($form_data['vendor_name'])){
            $updated_record = Vendor::where('id', $id)->update($input_arr);
            return redirect()->route('vendor.index')->withMessage(['type'=>'success','text'=>'Vendor Updated!']);
        }else{
            return redirect()->route('vendor.create')->with('error', 'Vendor Name is required.');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleted_data = Vendor::where('id', $id)->delete();
        return $id;
    }
}
