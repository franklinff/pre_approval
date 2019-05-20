<?php

namespace App\Http\Controllers;

use App\Roles;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;
use Config;

class UserController extends Controller
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
            ['data' => 'user_name','name' => 'user_name','title' => 'Name'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $users = User::orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($users)
                ->setRowId(function ($users){
                    return 'row_'.$users->id;
                })
                ->editColumn('rownum', function ($users) {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('user_name', function ($users) {
                    return $users->name;
                })
                ->editColumn('actions', function ($users) {
                    return view('user.actions', compact('users'));
                })
                ->rawColumns(['rownum', 'user_name', 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        return view('user.index', compact('html'));
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
        $roles = Roles::all();

        return view('user.add', compact('user', 'roles', 'role_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_fields = User::validate($request);
        if($validated_fields->fails()){
//            dd($validated_fields->fails());
            $errors = $validated_fields->errors();
            $request->flash();
            if($request->email != null){
                return $errors;
            }
            else{
                return redirect()->route('user.create')->withErrors($errors)->withInput();
            }
        }else{
            $input = $request->all();
            unset($input['_token']);
            $input['password'] = bcrypt(substr($input['name'], 0, 6).'123');

            $user = User::create($input);
            $input_role_user = array(
                'user_id' => $user->id,
                'role_id' => $input['role_id']
            );
            RoleUser::create($input_role_user);
            return redirect()->route('user.index')->with('success', 'The user created successfully!');
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
        $user = User::where('id', $id)->first();
        $roles = Roles::all();
        $role_users = RoleUser::all();

        return view('user.edit', compact('user', 'roles', 'role_users'));
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
        $input_arr = $request->all();
        $input_roles_user_arr = array(
            'user_id' => $id,
            'role_id' => $input_arr['role_id']
        );
        RoleUser::insert($input_roles_user_arr);
        $arr = array(
            'name' => $input_arr['name']
        );
        User::where('id', $id)->update($arr);
        return redirect()->route('user.index');
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
