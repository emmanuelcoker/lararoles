<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Role;
use App\Interfaces\PermissionInterface;

class PermissionService implements PermissionInterface
{

    public function allPermissions(){
        $permissions = Permission::latest()->get();
        return $permissions;
    }

    public function createPermission($permission_type, $role_id){
        $role = Role::find($role_id);
        $permission = new Permission();
        $permission->permission_type = $permission_type;
        $permission->save();

        //attach permission to role
        $role->permissions()->attach($permission);
        
        return $permission;
    }

    public function deletePermission($id){
        $permission = Permission::find($id);
        //detach the permission from the role before deleting
        $permission->roles()->each(function($role) use($permission){
            $role->permissions()->detach($permission);
        });
        
        $permission->delete();

    }
}