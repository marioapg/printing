<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

    public function delete(Request $request)
    {
        if ($request->user_id > 1) {
            $user = User::findOrFail($request->user_id);
            $user->delete();

            Session::flash('flash_message', 'Usuario eliminado');
            Session::flash('flash_type', 'alert-success');
            return redirect()->route('users.index');
        }

        Session::flash('flash_message', 'Usuario administrador #1 no se puede eliminar');
        Session::flash('flash_type', 'alert-warning');
        return redirect()->route('users.index');
    }

    public function create()
    {

        return view('admin.users_create');
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        return view('admin.users_edit', ['user' => $user]);
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

    public function update(UpdateUserRequest $request)
    {
        $params = $request->only(['name','phone']);

        if ($request->password) {
            Arr::set($params, 'password', $request->password);
        }

        $user = User::findOrFail($request->user_id);
        $user->update($params);

        $role = Role::where('name', $request->role)->first();
        $user->syncRoles($role);

        Session::flash('flash_message', 'Usuario actualizado');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('users.index');
    }
}
