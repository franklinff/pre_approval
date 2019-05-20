<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use SoftDeletes;
    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    public function permission()
    {
        return $this->belongsToMany('App\Permissions', 'role_permissions', 'role_id', 'permission_id');
    }

//    public function permissions()
//    {
//        return $this->belongsTo('App\RolePermission', 'id', 'role_id');
//    }

    public function role_permissions()
    {
        return $this->hasMany('App\RolePermission', 'role_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Role', 'parent_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo('App\Role', 'id', 'parent_id');
    }


}
