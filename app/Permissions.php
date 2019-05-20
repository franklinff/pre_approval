<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';

    public function role_permission(){
        return $this->belongsToMany('App\RolePermission', 'id', 'role_id');
    }
}
