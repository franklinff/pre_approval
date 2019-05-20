<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permissions';

    public function permissions()
    {
        return $this->belongsToMany('App\Permissions', 'role_permissions', 'role_id', 'permission_id');
    }
}
