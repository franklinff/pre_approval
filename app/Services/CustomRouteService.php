<?php

namespace App\Services;

use App\Roles;

use Route;

class CustomRouteService {

    public function __construct(Roles $role)
    {
        $this->roles = $role;
    }

    public function getRoutes(){

        $data=[];

        $routes=Route::getRoutes()->get();
        foreach($routes as $route)
        {
            if(isset($route->action['as'])){
                $data[]= $route->action['as'];
            }
        }
       
       return $data;
                             
    }



}