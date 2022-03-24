<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')
            ->select('id', 'name', 'email', 'phone', 'created_at', 'status')
            ->get();

        return view('admin.users_index', ['users' => $users]);
    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        return view('admin.users_show', ['user' => $user]);
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        // $user->delete();

        return redirect()->route('users.index');
    }

    public function create()
    {

        return view('admin.users_create');
    }

    public function store(CreateUserRequest $request)
    {

        $user = User::create($request->all());
        $role = Role::where('name', $request->role)->first();
        $user->assignRole($role);

        Session::flash('flash_message', 'Usuario creado');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('users.index');
    }
}
