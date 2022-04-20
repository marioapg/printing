<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\User;
use App\Models\Gerence;
use App\Models\Subgerence;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')
            ->select('id', 'name', 'email', 'phone', 'created_at', 'status', 'gerence_id')
            ->role(['user', 'gerente'])
            ->get()
            ->load(['gerence']);

        return view('admin.users_index', ['users' => $users]);
    }

    public function indexAdmin(Request $request)
    {
        $users = User::with('roles')
            ->select('id', 'name', 'email', 'phone', 'created_at', 'status')
            ->role('admin')
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
        $gerencias = Gerence::select(['id', 'name'])->get();

        return view('admin.users_create', [
            'gerencias' => $gerencias
        ]);
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $gerBelong = $user->salesGerence->gerence_id ?? null;
        $subgerencias = Subgerence::select(['id', 'name', 'gerence_id'])
                            ->where('gerence_id', $gerBelong)->get();
        $gerencias = Gerence::select(['id', 'name'])->get();

        return view('admin.users_edit', [
            'user' => $user,
            'gerencias' => $gerencias,
            'subgerencias' => $subgerencias,
            'gerBelong' => $gerBelong
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        if (($request->role === 'gerente') && ($request->gerence_id === 'null')) {

            Session::flash('flash_message', 'Debe indicar una gerencia para un usuario Gerente');
            Session::flash('flash_type', 'alert-danger');
            return back();
        }

        $gerence = ($request->role === 'gerente') ? $request->gerence_id : null;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'gerence_id' => $gerence
        ]);

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

        if ($user->hasRole('admin')) {

            return redirect()->route('users.index.admin');
        }

        return redirect()->route('users.index');
    }
}
