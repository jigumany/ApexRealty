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
        $users = User::all();
        $title = 'Users';
        return view('modules.users.index', compact('users', 'title', 'current_user'));
    }

    public function create(Request $request) {
        $title = 'Create User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('modules.users.create', compact('title', 'roles'));
    }

    public function store(StoreUserRequest $request) {
        $validated = $request->validated();
        $user = User::create($validated);
        $user->roles()->attach($validated['role_id']);
        return redirect('/admin/users/')->with('status-created', 'User has been created!');
    }
    
    public function edit(User $user) {
        $title = 'Update User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $user_role = $user->roles()->orderBy('name')->first();
        return view('modules.users.edit', compact('title', 'user', 'user_role', 'roles'));
    }

    const FIELDS = ['name', 'email', 'position_title', 'phone'];
    public function update(User $user, Request $request) {
        $title = 'Users';
        $request->session()->flash('user.updated.success', 'User has been updated!');
        foreach(self::FIELDS as $field) {
            if($request->$field) {
                $user->$field = $request->$field;
                $user->save();
            }
        }
        return redirect('/admin/users/');
    }
    public function delete(User $user, Request $request) {
        $user->roles()->detach();
        $user->delete();
        return redirect('/admin/users/')->with('status-deleted', 'User has been Deleted!');
    }

}
