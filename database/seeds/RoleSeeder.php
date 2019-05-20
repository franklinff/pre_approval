<?php

use Illuminate\Database\Seeder;
use App\Roles;
use App\Permissions;
use App\RolePermission;
// use Route;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Roles::truncate();
        Permissions::truncate();
        RolePermission::truncate();


        $input_roles = [
            'role_name'=>'admin',
            'description'=>'Administrator,Have all the rights by default.',
            'display_name'=>'admin',
            'redirect_to'=>'company.index'
        ];
        $inserted_role = Roles::insertGetId($input_roles);


        $permissions=[];
        $routes =  Route::getRoutes()->get();

        foreach($routes as $route)
        {
            if(isset($route->action['as'])){
                $permissions[]=$route->action['as'];
            }
        }

        // dd($permissions);

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
    }
}
