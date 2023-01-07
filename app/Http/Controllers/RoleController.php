<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }

    //all roles
    public function index(){
        return view('dashboard', ['roles' => $this->roleService->allRoles()]);
    }

    public function create(){
        return view('role.create');
    }


    public function store(Request $request){
        $this->roleService->createRole($request->role_name, $request->description);
        return redirect('/roles');
    }

    public function delete($id){
        $this->roleService->deleteRole($id);
        return redirect('/roles');
    }
}
