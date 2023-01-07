<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::whereDoesntHave('roles')->orWhereHas('roles', function($query){
            $query->where('role_name','!=', 'admin');
        })->get();
        return view('dashboard', ['users' => $users]);
    }

    public function assignRoleForm(User $user){
        $roles = Role::whereNotIn('role_name', $user->roles->pluck('role_name'))->get();

        return view('user.assignRoleForm', ['user' => $user, 'roles' => $roles]);
    }

    public function assignRole(User $user, Request $request, RoleService $roleService){
        $roleService->assignRole($user->id, $request->role_id);
        return redirect('/users');
    }

    public function detachRoleForm(User $user){
        $roles = Role::whereIn('role_name', $user->roles->pluck('role_name'))->get();

        return view('user.detachRoleForm', ['user' => $user, 'roles' => $roles]);
    }

    public function detachRole(User $user, Request $request, RoleService $roleService){
        $roleService->detachRole($user->id, $request->role_id);
        return redirect('/users');
    }
}
