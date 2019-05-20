<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_route = \Request::route()->getName();
//        dd('=====');
        if(Auth::user() != null){

            $user = User::where('id', Auth::user()->id)->with(
                ['roles' => function($q){
                $q->with(['permission'])->get();
            } ])->first();
//            dd($user);
            $users = $user->toArray();
            $role_name=null;
            $permissions_arr=array();


            if(isset($users['roles'][0]['role_name'])){
                $role_name=$users['roles'][0]['role_name'];
            }
            Session::put('role_name',$role_name);

            if(isset($users['roles'][0]['permission'])){
                $permissions_arr=$users['roles'][0]['permission'];
            }

//            dd($permissions_arr);
            $permissions = array_pluck($permissions_arr, 'name');
            Session::put('permissions', $permissions_arr);
            Session::put('current_route', $current_route);


            if(in_array($current_route, $permissions)){
                return $next($request);
            }
        }
        return redirect()->route('login');
    }
}
