<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        $current_user = auth()->user();
        $users = User::with('roles')->get();
        $title = 'Users';
        return view('modules.users.index', compact('users', 'title', 'current_user'));
    }

    public function create(Request $request) {
        $title = 'Create User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('modules.users.create', compact('title', 'roles'));
    }

    public function store(StoreUserRequest $request, $id = null) {
        $validated = $request->validated();
        if($id) {
            $user = User::find($id);
            if($user) {
                $user->update($request->all());
                $user->roles()->sync($request->role_id);
                $msg = "User has been updated!";
            }
        } else {
            $user = User::create($request->all());
            $user->roles()->attach($validated['role_id']);
            $msg = "User has been created!";

        }

        return redirect('/admin/users/')->with('success', $msg);
    }
    
    public function edit(User $user) {
        $title = 'Update User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $user_role = $user->roles()->orderBy('name')->first();
        return view('modules.users.edit', compact('title', 'user', 'user_role', 'roles'));
    }

    public function suspendOrActivate(User $user) {
        if($user->is_active == 1) {
            $user->update([
                'is_active' => 0
            ]);
            $msg = 'User has been suspended.';
        } else {
            $user->update([
                'is_active' => 1
            ]);
            $msg = "User has been activated.";
        }
        return redirect('/admin/users')->with('success', $msg);
    }
    
    public function delete(User $user, Request $request) {
        $user->roles()->detach();
        $user->delete();
        return redirect('/admin/users/')->with('success', 'User has been Deleted!');
    }
}
