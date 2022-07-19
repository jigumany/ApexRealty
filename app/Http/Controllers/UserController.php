<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        // TODO sort by admin status and then name?
        $current_user = auth()->user();
        $title = 'Users';
        $users = User::orderBy('name')->filter(request(['search']))->paginate(
            $perPage = 9, $columns = ['*'], $pageName = 'users'
        );
        return view('modules.users.index', compact('users', 'title', 'current_user'));
    }

    public function create() {
        $title = 'Create User';
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('modules.users.create', compact('title', 'roles'));
    }

    public function store(Request $request, $id = null) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position_title' => 'required',
            'phone' => 'nullable',
        ]);
        if($id) {
            $user = User::find($id);
            if($user) {
                $user->update($validated);
                $user->roles()->sync($request->role_id);
                $msg = "User has been updated!";
            }
        } else {
            $user = User::create($validated);
            $user->roles()->attach($request->role_id);
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
