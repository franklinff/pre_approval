<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_user(){
        return view('auth.login');
    }

    public function loginUser(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }else{
            return back()->with('error', "Please enter valid credentials");
        }
    }

    public function registerUser(Request $request){
        $input = array(
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        );

        User::create($input);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $role_name = $request->session()->get('role_name');
        
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
