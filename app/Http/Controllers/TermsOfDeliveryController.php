<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\TermsOfDelivery;
use Config;
use File;
use Storage;

class TermsOfDeliveryController extends Controller
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
            ['data' => 'terms_of_delivery','name' => 'terms_of_delivery','title' => 'Term of Delivery'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $terms_of_delivery = TermsOfDelivery::orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($terms_of_delivery)
                ->setRowId(function ($terms_of_delivery){
                    return 'row_'.$terms_of_delivery->id;
                })
                ->editColumn('rownum', function ($terms_of_delivery) {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('terms_of_delivery', function ($terms_of_delivery) {
                    return $terms_of_delivery->term_of_delivery;
                })
                ->editColumn('actions', function ($terms_of_delivery) {
                    return view('terms_of_delivery.actions', compact('terms_of_delivery'));
                })
                ->rawColumns(['rownum', 'terms_of_delivery', 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('terms_of_delivery.index', compact('html'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
        $deleted_data = TermsOfDelivery::where('id', $id)->delete();
        return $id;
    }
}
