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

    public function store(StoreUserRequest $request) {
        $validated = $request->validated();
        $user = User::create($validated);
        $user->roles()->attach($validated['role_id']);
        return redirect('/admin/users/')->with('success', 'User has been created!');
    }
    
    public function edit(User $user) {
        $title = 'Update User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $user_role = $user->roles()->orderBy('name')->first();
        return view('modules.users.edit', compact('title', 'user', 'user_role', 'roles'));
    }

    public function update(User $user, Request $request) {
        $user->update([
            'name'=> $request->name,
            'email' => $request->email,
            'position_title' => $request->position_title,
            'phone' => $request->phone,
        ]);

        $user->roles()->sync($request->role_id);
        return redirect('/admin/users')->with('success', 'User has been updated!');

    }
    
    public function delete(User $user, Request $request) {
        $user->roles()->detach();
        $user->delete();
        return redirect('/admin/users/')->with('success', 'User has been Deleted!');
    }

}
