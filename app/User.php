<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function validate($request){
        $validatedata = Validator::make($request->input(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
//            'password' => 'required',
        ]);

        return $validatedata;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'role_users', 'user_id', 'role_id')/*->withPivot('start_date', 'end_date')*/;
    }

//    public function roles()
//    {
//        return $this->belongsToMany('App\Roles', 'role_users', 'user_id', 'role_id')/*->withPivot('start_date', 'end_date')*/;
//    }

    public function roleusers()
    {
        return $this->belongsTo('App\RoleUser', 'user_id', 'role_id');
    }
}
