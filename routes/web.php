<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $users = User::with('roles')->whereHas('roles', function($query){
        $query->where('role_name','!=', 'admin');
    })->get();

    return view('dashboard', ['users' => $users]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/users',                [UserController::class, 'index'])->name('users');
    Route::get('/user/{user}/assign',     [UserController::class, 'assignRoleForm'])->name('assign-role-form');
    Route::post('/user/assign/{user}',    [UserController::class, 'assignRole'])->name('assign-role');

    Route::get('/user/{user}/detach',     [UserController::class, 'detachRoleForm'])->name('detach-role-form');
    Route::post('/user/detach/{user}',    [UserController::class, 'detachRole'])->name('detach-role');



    Route::get('/roles',          [RoleController::class, 'index'])->name('roles');
    Route::get('/roles/create',   [RoleController::class, 'create'])->name('create-role');
    Route::post('/roles/store',   [RoleController::class, 'store'])->name('store-role');
    Route::delete('/roles/{id}',  [RoleController::class, 'delete'])->name('delete-role');


    //permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/permissions/create',  [PermissionController::class, 'create'])->name('create-permission');
    Route::post('/permissions/store',  [PermissionController::class, 'store'])->name('store-permission');
    Route::delete('/permissions/{id}',  [PermissionController::class, 'delete'])->name('delete-permission');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
