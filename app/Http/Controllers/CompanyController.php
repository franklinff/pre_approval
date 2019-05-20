<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Company;
use Config;
use File;
use Storage;

class CompanyController extends Controller
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
            ['data' => 'company_name','name' => 'company_name','title' => 'Name'],
            ['data' => 'gstin_uin','name' => 'gstin_uin','title' => 'GSTIN/UIN'],
            ['data' => 'pan','name' => 'pan','title' => 'Pan No'],
            ['data' => 'address','name' => 'address','title' => 'Address'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $company_details = Company::orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($company_details)
                ->setRowId(function ($company_details){
                    return 'row_'.$company_details->id;
                })
                ->editColumn('rownum', function ($company_details) {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('company_name', function ($company_details) {
                    return $company_details->company_name;
                })
                ->editColumn('gstin_uin', function ($company_details) {
                    return $company_details->gstin_uin;
                })
                ->editColumn('pan', function ($company_details) {
                    return $company_details->pan;
                })
                ->editColumn('address', function ($company_details) {
                    return $company_details->address;
                })
                ->editColumn('actions', function ($company_details) {
                    return view('company.actions', compact('company_details'));
                })
                ->rawColumns(['rownum', 'company_name'/*, 'company_logo'*/, 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('company.index', compact('html'));
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
        return view('company.add');
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
        // dd($form_data);
        $request->flash();
        if($request->file('company_logo')) {
            $file = $request->file('company_logo');
            $extension = $file->getClientOriginalExtension();

            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $time = time();
                $name = File::name(str_replace(' ', '_',$request->file('company_logo')->getClientOriginalName())) . '_' . $time . '.' . $extension;
                $folder_name = "public/company_logos";
                $folder_name_1 = "storage/company_logos";
                $path = '/' . $folder_name_1. '/' . $name;
                $file_upload = $this->CommonController->file_upload($folder_name, $file, $name);

                // dd($form_data);
                $input_arr = array(
                    'company_name' => $form_data['company_name'],
                    'logo_path' => $path,
                    'address'   => $form_data['address'],
                    'gstin_uin' => $form_data['gstin_uin'],
                    'pan' => $form_data['pan'],
                );

                // dd($input_arr);
                if(!empty($file_upload)){
                    $inserted_record = Company::create($input_arr);
                    // dd($inserted_record);
                    return redirect()->route('company.index')->withMessage(['type'=>'success','text'=>'Comapany Added!']);
                }
            }else{
                return redirect()->route('company.create')->with('error', 'Only files with .jpg and .jpeg extension allowed.')->withInput();
            }
        }else{
            return redirect()->route('company.create')->with('error', 'Company logo is required.');
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
//        dd($id);
        $company_detail = Company::where('id', $id)->first();
//        dd($company_detail);
        return view('company.edit', compact('company_detail', 'id'));
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
//        dd($request->all());
        $uploaded_file = Company::where('id', $id)->first();
        $form_data = $request->all();
        if($request->file('company_logo')) {
            $file = $request->file('company_logo');
            $extension = $file->getClientOriginalExtension();
            $request->flash();
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $time = time();
                $name = File::name(str_replace(' ', '_',$request->file('company_logo')->getClientOriginalName())) . '_' . $time . '.' . $extension;
                $folder_name = "public/company_logos";
                $folder_name_1 = "storage/company_logos";
                $path = '/' . $folder_name_1. '/' . $name;

                $delete_file_path = str_replace('/storage',"public",$uploaded_file->logo_path);
                $file_deleted = $this->CommonController->file_delete($delete_file_path);
                $file_upload = $this->CommonController->file_upload($folder_name, $file, $name);

                $input_arr = array(
                    'company_name' => $form_data['company_name'],
                    'logo_path' => $path,
                    'address'   => $form_data['address'],
                    'gstin_uin' => $form_data['gstin_uin'],
                    'pan' => $form_data['pan'],
                );


                if(!empty($file_upload)){
                    $updated_record = Company::where('id', $id)->update($input_arr);
                    return redirect()->route('company.index')->withMessage(['type'=>'success','text'=>'Company Updated!']);
                }
            }else{
                return redirect()->route('company.edit', $id)->with('error', 'Only files with .jpg and .jpeg extension allowed.');
            }
        }else{
            $path = $uploaded_file->logo_path;

            $request->flash();
            $input_arr = array(
                'company_name' => $form_data['company_name'],
                'logo_path' => $path,
                'address'   => $form_data['address'],
                'gstin_uin' => $form_data['gstin_uin'],
                'pan' => $form_data['pan'],
            );
            $updated_record = Company::where('id', $id)->update($input_arr);
            return redirect()->route('company.index')->withMessage(['type'=>'success','text'=>'Company Updated!']);
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
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $uploaded_file = Company::where('id', $id)->first();
        $delete_file_path = str_replace('/storage',"public",$uploaded_file->logo_path);
        $this->CommonController->file_delete($delete_file_path);

        $deleted_data = Company::where('id', $id)->delete();
        return $id;
    }
}
