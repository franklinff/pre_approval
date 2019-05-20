<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $user = User::with(['roles'])->where('id', Auth::user()->id)->first();
        //dump($user->toArray());
        $roles = array_get($user, 'roles')->first();
        //dd($roles->toArray());

        if(isset($roles->redirect_to))
        {
            $role_name = $roles->name;
            return redirect()->route($roles->redirect_to);
        }

        // redirect()->url();
//        return view('welcome');

         abort(404);
    }
}
