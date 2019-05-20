<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\RolePermission;
use Illuminate\Http\Request;
use App\Roles;
use Config;
use Route;
use Yajra\DataTables\DataTables;
use App\Services\CustomRouteService as CustomRouteServices;

class RoleController extends Controller
{

    public function __construct(CustomRouteServices $customRouteServices)
    {
        $this->customRouteServices=$customRouteServices;
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
            ['data' => 'role_name','name' => 'role_name','title' => 'Name'],
//            ['data' => 'company_logo','name' => 'company_logo','title' => 'Logo'],
            ['data' => 'actions','name' => 'actions','title' => 'Actions'],
        ];
        $getRequest = $request->all();
        $roles = Roles::orderBy('id', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {

            return $datatables->of($roles)
                ->setRowId(function ($roles){
                    return 'row_'.$roles->id;
                })
                ->editColumn('rownum', function ($roles) {
                    static $i = 0;
                    $i++;
                    return $i;
                })
                ->editColumn('role_name', function ($roles) {
                    return $roles->role_name;
                })
                ->editColumn('actions', function ($roles) {
                    return view('admin.roles.actions', compact('roles'));
                })
                ->rawColumns(['rownum', 'role_name', 'actions'])
                ->make(true);

        }

        $html = $datatables->getHtmlBuilder()->columns($columns)->parameters($this->getParameters());
        // dd($html);
        return view('admin.roles.index', compact('html'));
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
        $routes = Route::getRoutes()->get();
        $roles = Roles::all();
        return view('admin.roles.add', compact('routes', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_arr = $request->all();
        unset($input_arr['_token'], $input_arr['permissions']);

        $input_roles = $input_arr;
        $inserted_role = Roles::insertGetId($input_roles);

        // dd($inserted_role);
        if($input_arr['parent_id'] != null){
            $roles = Roles::where('id', $input_arr['parent_id'])->first();
            $roles_updated = Roles::where('id', $input_arr['parent_id'])->update(['child_id' => $inserted_role]);
        }

        $permissions =  $request->permissions;
        $i = 0;

        $input_permissions=array();
        foreach ($permissions as $permission){

            $flag=Permissions::where('name',$permission)->exists();

            if(!$flag){
                $permission_route = explode('.', $permission);
                $common_display_name='';
                $common_description='';
                if(!empty($permission_route[1])){
                    $permConfig=config("commonConfig.routes.$permission_route[1]");
                    if(!empty($permConfig)){

                        $common_display_name=$permConfig['display_name'];
                        $common_description=$permConfig['description'];

                    }else{
                        $common_display_name=ucfirst($permission_route[1]);
                        $common_description=ucfirst($permission_route[1]);
                    }
                }

                $input_permissions[$i]['name'] = $permission;
                $input_permissions[$i]['display_name'] = ucwords($common_display_name.' '. $permission_route[0]);
                $input_permissions[$i]['description'] = ucfirst($common_description.' '. $permission_route[0]);
                $i++;
            }
        }

        // dd($input_permissions);

        if(!empty($input_permissions)){
            $permissions[] = Permissions::insert($input_permissions);
        }
        $permissions = Permissions::whereIn('name', $permissions)->get();
        $i=0;
        foreach($permissions as $permission){
            $permission_role[$i]['role_id'] = $inserted_role;
            $permission_role[$i]['permission_id'] = $permission->id;
            $i++;
        }
        $permission_role = RolePermission::insert($permission_role);
        return redirect()->route('role.index')->withMessage(['type'=>'success','text'=>'Role Added!']);
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
        $role = Roles::where('id', $id)->with('permission')->first();
        $roles = Roles::all();
        $routes = Route::getRoutes()->get();
        // dd($role->permission->pluck('name')->toArray());
        $permittedRoutes=$role->permission->pluck('name')->toArray();
        return view('admin.roles.edit', compact('role','roles','routes','permittedRoutes') );
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

        $inserted_role =$id;

        $input_arr = $request->all();

        unset($input_arr['_token'], $input_arr['_method'], $input_arr['permissions']);

        $input_roles = $input_arr;
        Roles::where(['id'=>$id])->update($input_roles);
        if($input_arr['parent_id'] != null){
            $roles = Roles::where('id', $input_arr['parent_id'])->first();
            $roles_updated = Roles::where('id', $input_arr['parent_id'])->update(['child_id' => $id]);
        }

        $permissions =  $request->permissions;

        // append default admin rights from config
        // supposed $id==1 is admin_id role

        if($id==1){

            $routes = $this->customRouteServices->getRoutes();

            $admin_rights_default=config('commonConfig.admin_rights_default');

            $newArr=array_filter($routes,function($item) use ($admin_rights_default) {
                $input=explode('.',$item);
                if(in_array($input[0],$admin_rights_default)){
                    return $item;
                }else{
                    if(isset($input[1])){
                        if(in_array($input[1],$admin_rights_default)){
                            return $item;
                        }
                    }
                }
            });

            $permissions=array_merge($permissions,$newArr);
        }


        $i = 0;

        $input_permissions=[];

        foreach ($permissions as $permission){

            $flag=Permissions::where('name',$permission)->exists();

            if(!$flag){
            
                $permission_route = explode('.', $permission);

                $common_display_name='';
                $common_description='';
                if(!empty($permission_route[1])){
                    $permConfig=config("commonConfig.routes.$permission_route[1]");
                    if(!empty($permConfig)){

                        $common_display_name=$permConfig['display_name'];
                        $common_description=$permConfig['description'];

                    }else{
                        $common_display_name=ucfirst($permission_route[1]);
                        $common_description=ucfirst($permission_route[1]);
                    }
                }

            // echo $permission_route[0] . " : " . $common_display_name ." , ". $common_description . "<br/>";


                $input_permissions[$i]['name'] = $permission;
                $input_permissions[$i]['display_name'] = ucwords($common_display_name.' '. $permission_route[0]);
                $input_permissions[$i]['description'] = ucfirst($common_description.' '. $permission_route[0]);
                $i++;
            }
        }

        

        if(!empty($input_permissions))
        {
            Permissions::insert($input_permissions);
        }

        $permissions = Permissions::whereIn('name', $permissions)->get();
        $i=0;
        $permission_role=[];

        RolePermission::where('role_id',$inserted_role)->delete();

        foreach($permissions as $permission){

            // $flagRolePermission= RolePermission::where('role_id',$inserted_role)
            // ->where('permission_id',$permission->id)
            // ->exists();
            // flagRolePermission=true;
            // if(!$flagRolePermission){
                $permission_role[$i]['role_id'] = $inserted_role;
                $permission_role[$i]['permission_id'] = $permission->id;
                $i++;
            // }
        }
        if(!empty($permission_role)){
            $permission_role = RolePermission::insert($permission_role);
        }
        return redirect()->route('role.index')->withMessage(['type'=>'success','text'=>'Role Updated!']);
        // dd($request->all());

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
