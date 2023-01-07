<?php

namespace App\Interfaces;


Interface PermissionInterface
{
    public function allPermissions();
    public function createPermission($permission_type, $role);
    public function deletePermission($id);
}