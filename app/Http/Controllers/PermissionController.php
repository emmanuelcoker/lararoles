<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Models\Role;

class PermissionController extends Controller
{
    protected $permissionsService;

    public function __construct(PermissionService $permissionService){
        $this->permissionService = $permissionService;
    }

    //all roles
    public function index(){
        return view('dashboard', ['permissions' => $this->permissionService->allPermissions()]);
    }

    public function create(){
        $roles = Role::latest()->get();
        return view('permission.create', ['roles' => $roles]);
    }


    public function store(Request $request){
        $this->permissionService->createPermission($request->permission_type, $request->role_id);
        return redirect('/permissions');
    }


    public function delete($id){
        $this->permissionService->deletePermission($id);
        return redirect('/permissions');
    }
}


