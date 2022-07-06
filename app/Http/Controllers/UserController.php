<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        $title = 'Users';
        return view('modules.users.index', compact('users', 'title'));
    }

    public function create() {
        $title = 'Create User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('modules.users.create', compact('title', 'roles'));
    }

    public function store(StoreUserRequest $request) {
        $validated = $request->validated();
        $user = User::create($validated);
        $user->roles()->attach($validated['role_id']);
    }
    
    public function edit(User $user) {
        $title = 'Update User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $user_role = $user->roles()->orderBy('name')->first();
        return view('modules.users.edit', compact('title', 'user', 'user_role', 'roles'));
    }

    public function update(User $user) {

    }


}
