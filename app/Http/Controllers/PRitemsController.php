<?php

namespace App\Http\Controllers;

use App\PRitems;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Config;

class PRitemsController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pr_items.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_fields = PRitems::validate($request);

        $input = $request->all();
        unset($input['_token'], $input['total_amount']);
        $input['date'] = date('Y-m-d', strtotime($input['date']));

        if($validated_fields->fails()){
            $errors = $validated_fields->errors();
            $request->flash();
            return redirect()->back()->withErrors($errors)->withInput();
        }else{
            $pr_items_inserted = PRitems::insert($input);
        }

        if(isset($input['po_no_id'])){
            $id = $input['po_no_id'].'_po';
        }elseif(isset($input['pr_no_id'])){
            $id = $input['pr_no_id'].'_pr';
        }

        return redirect()->route('pr_items.show', $id)->with('item_added','Item added and listed below.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request, DataTables $datatables)
    {

        $purchase_type_id = $id;
        $purchase_type_ids = explode('_', $id);
        $purchase_type = explode('_', $id)[1];
        $id = explode('_', $id)[0];

        $columns = [
            ['data' => 'rownum','name' => 'rownum','title' => 'Sr No.','searchable' => false],
            ['data' => 'date','name' => 'date','title' => 'Date'],
            ['data' => 'material_description','name' => 'material_description','title' => 'Material Description'],
            ['data' => 'purpose','name' => 'purpose','title' => 'Purpose'],
            ['data' => 'quantity','name' => 'quantity','title' => 'Quantity'],
            ['data' => 'unit_price','name' => 'unit_price','title' => 'Unit Price'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        if($purchase_type == 'po'){
            $pr_items_details = PRitems::where('po_no_id',$id)->orderBy('id', 'desc')->get();
        }elseif($purchase_type == 'pr'){
            $pr_items_details = PRitems::where('pr_no_id',$id)->orderBy('id', 'desc')->get();
        }


        $count_pr_items = count($pr_items_details);

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($pr_items_details)
                ->setRowId(function ($pr_items_details){
                    return 'row_'.$pr_items_details->id;
                })
                ->editColumn('rownum', function ($vendor_details) {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('date', function ($pr_items_details) {
                    return date('d-m-Y', strtotime($pr_items_details->date));
                })
                ->editColumn('material_description', function ($pr_items_details) {
                    return $pr_items_details->material_description;
                })
                ->editColumn('purpose', function ($pr_items_details) {
                    return $pr_items_details->purpose;
                })
                ->editColumn('quantity', function ($pr_items_details) {
                    return $pr_items_details->quantity;
                })
                ->editColumn('unit_price', function ($pr_items_details) {
                    return $pr_items_details->unit_price;
                })
                ->editColumn('actions', function ($pr_items_details) use($purchase_type_id) {
                    return view('pr_items.actions', compact('pr_items_details','purchase_type_id'));
                })
                ->rawColumns(['rownum', 'date', 'material_description', 'purpose', 'quantity', 'unit_price', 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('pr_items.add', compact('id', 'html','count_pr_items', 'purchase_type_ids', 'purchase_type','purchase_type_id'));
    }

    protected function getParameters() {
        return [
            'serverSide' => true,
            'processing' => true,
            'ordering'   =>'isSorted',
            "pageLength" => $this->list_num_of_records_per_page,
            "filter" => [
                'class' => 'test_class'
            ]
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase_type_id = $id;
        $purchase_type_ids = explode('_', $id);
        $pr_items_details = PRitems::where('id', $purchase_type_ids[2])->first();
        unset($purchase_type_ids[2]);
        $purchase_type = implode('_', $purchase_type_ids);
        return view('pr_items.edit',compact('pr_items_details','purchase_type_id', 'purchase_type'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  //  public function update(Request $request,$id,$p_ritems_id)
    public function update(Request $request,$id)
    {
        $purchase_type_ids = explode('_', $id);
        $items = PRitems::find( $purchase_type_ids[2]);
        $items->material_description = $request->material_description;
        $items->purpose = $request->purpose;
        $items->quantity = $request->quantity_edit;
        $items->unit_price = $request->unit_price_edit;
        $items->date = date('Y-m-d',strtotime($request->m_datepicker));
        $items->save();

        unset($purchase_type_ids[2]);
        $purchase_type = implode('_',$purchase_type_ids);
        return redirect()->route('pr_items.show',$purchase_type)->with('updated', 'Item details updated!');
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
        $purchase_type_ids = explode('_', $id);
        $deleted_data = PRitems::where('id', $purchase_type_ids[2])->delete();
        if($deleted_data == true){
            return redirect()->back()->with('deleted', 'Item deleted!');
        }
    }
}
