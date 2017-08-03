<?php

namespace App\Http\Controllers;

use App\User;
use App\Warehouse;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    		
    public function index(User $user) {
    	$users = $user->all();
    	return view('admin.user.index', compact('users'));
    }
    
    public function show(User $user, Warehouse $wares, Role $roles, $id) {
    	$user = $user->findorfail($id);
    	$wares = $wares->all();
    	$roles = $roles->all();
    	// return $user;
    	return view('admin.user.single', compact('user', 'wares', 'roles'));
    }


    public function update(User $user, $id) {
    	$user = $user->find($id);
    	$user->warehouse_id = request()->input('ware');
    	$user->role_id = request()->input('role');

    	$user->save();
    	return redirect()->back()->with('message', 'Success!');
    }
    
}
