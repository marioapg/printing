<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
}
