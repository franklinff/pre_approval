<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DeliveryLocation;
use Config;
use File;
use Storage;

use App\PRnumber;
use App\PoNumber;

class DeliveryLocationController extends Controller
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
            ['data' => 'location','name' => 'location','title' => 'Location'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $delivery_location = DeliveryLocation::orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($delivery_location)
                ->setRowId(function ($delivery_location){
                    return 'row_'.$delivery_location->id;
                })
                ->editColumn('rownum', function () {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('location', function ($delivery_location) {
                    return $delivery_location->location;
                })
                ->editColumn('actions', function ($delivery_location) {
                    return view('delivery_location.actions', compact('delivery_location'));
                })
                ->rawColumns(['rownum', 'location'/*, 'company_logo'*/, 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder(["class"=>"m-datatable", "id"=>"html_table"])->columns($columns)->parameters($this->getParameters());
        return view('delivery_location.index', compact('html'));
    }


    protected function getParameters() {
        return [
            'serverSide' => true,
            'processing' => true,
            'ordering'   =>'isSorted',
//            "order"=> [2, "desc" ],
            "pageLength" => $this->list_num_of_records_per_page,
             /*'fixedHeader' => [
                 'header' => true,
                 'footer' => true
             ],*/
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
        return view('delivery_location.add');
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
        if(!empty($form_data['location'])){
            $input_arr = array(
                'location' => $form_data['location']
            );
            $inserted_record = DeliveryLocation::create($input_arr);
            return redirect()->route('delivery_location.index')->with('success', 'Location added successfully!');
        }else{
            return redirect()->route('delivery_location.create')->with('error', 'Location field is required.');
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
        $delivery_location = DeliveryLocation::where('id', $id)->first();
        return view('delivery_location.edit', compact('delivery_location'));
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
        if(!empty($form_data['location'])){
            $input_arr = array(
                'location' => $form_data['location']
            );
            $updated_record = DeliveryLocation::where('id', $id)->update($input_arr);
            return redirect()->route('delivery_location.index');
        }else{
            return redirect()->route('delivery_location.create')->with('error', 'Location field is required.');
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
        $deleted_data = DeliveryLocation::where('id', $id)->delete();
        return $id;
    }




    /**
     * Generate PDF
     */

    public function generatePDF(Request $request,$id){


        $ids = explode('_',$id);

        if($ids[1] == 'po'){

            $pr_number = PoNumber::with('get_company_name','get_deliverylocation_name','get_vendor_name','delivery_terms')
                ->where('po_numbers.id',$ids[0])->first();
           /* $pr_number = \DB::table('po_numbers as prn')
                ->leftJoin('company as c','prn.company_id','=','c.id')
                ->leftJoin('delivery_location as dl','prn.delivery_location','=','dl.id')
                ->leftJoin('vendor as v','prn.vendor_supplier_name','=','v.id')

                ->leftJoin('terms_of_deliveries as deli','prn.terms_of_delivery','=','deli.id')
                ->where('prn.id',$ids[0])
                ->first([
                    'prn.*',
                    'c.company_name as company',
                    'c.gstin_uin as company_gstin_uin',
                    'c.pan as company_pan',
                    'c.address as company_address',
                    'dl.location as delivery_location',
                    'v.vendor_name as vendor_supplier_name',
                    'v.gstin_uin',
                    'v.address',
                    'deli.term_of_delivery'
                ]);*/

            if(!$pr_number){
                throw new \Exception('Pr No does not exist');
            }

            $pr_items=\DB::table('p_ritems')
                ->where('po_no_id',$ids[0])
                ->get();
        }

        if($ids[1] == 'pr'){

            $pr_number = PRnumber::with('get_company_name','get_deliverylocation_name','get_vendor_name','delivery_terms')
                                    ->where('p_rnumbers.id',$ids[0])->first();
           /* $pr_number = \DB::table('p_rnumbers as prn')
                ->leftJoin('company as c','prn.company_id','=','c.id')
                ->leftJoin('delivery_location as dl','prn.delivery_location','=','dl.id')
                ->leftJoin('vendor as v','prn.vendor_supplier_name','=','v.id')
                ->leftJoin('terms_of_deliveries as deli','prn.terms_of_delivery','=','deli.id')
                ->where('prn.id',$ids[0])
                ->first([
                    'prn.*',
                    'c.company_name as company',
                    'c.gstin_uin as company_gstin_uin',
                    'c.pan as company_pan',
                    'c.address as company_address',
                    'dl.location as delivery_location',
                    'v.vendor_name as vendor_supplier_name',
                    'v.gstin_uin',
                    'v.address',
                    'deli.term_of_delivery'
                ]);*/

            if(!$pr_number){
                throw new \Exception('Pr No does not exist');
            }

            $pr_items=\DB::table('p_ritems')
                ->where('pr_no_id',$ids[0])
                ->get();
        }


        $pr_number->pr_items=$pr_items??collect([]);

        $pdf = \PDF::loadView('myPDF', compact('pr_number', 'ids'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream();
    }


    public function getIndianCurrency(float $number)
    {
        $no = round($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
         '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
         '7' => 'seven', '8' => 'eight', '9' => 'nine',
         '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
         '13' => 'thirteen', '14' => 'fourteen',
         '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
         '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
         '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
         '60' => 'sixty', '70' => 'seventy',
         '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
          $divider = ($i == 2) ? 10 : 100;
          $number = floor($no % $divider);
          $no = floor($no / $divider);
          $i += ($divider == 10) ? 1 : 2;
          if ($number) {
             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
             $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
             $str [] = ($number < 21) ? $words[$number] .
                 " " . $digits[$counter] . $plural . " " . $hundred
                 :
                 $words[floor($number / 10) * 10]
                 . " " . $words[$number % 10] . " "
                 . $digits[$counter] . $plural . " " . $hundred;
          } else $str[] = null;
       }
       $str = array_reverse($str);
       $result = implode('', $str);
       $points = ($point) ?
         "." . $words[$point / 10] . " " .
               $words[$point = $point % 10] . "Paise" : '';
       return $result . "Rupees  " . $points;
    }
}
