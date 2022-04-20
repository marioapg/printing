<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'phone' => '12345678',
            'password' => 'secret1234'
            ]
        );

        $role = Role::where('name', 'admin')->first();

        $user->assignRole($role);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'phone' => '12345678',
            'password' => 'secret1234'
            ]
        );

        $role = Role::where('name', 'user')->first();

        $user->assignRole($role);

        $user = User::create([
            'name' => 'Gerente',
            'email' => 'gerente@test.com',
            'phone' => '12345678',
            'password' => 'secret1234',
            'gerence_id' => 1
            ]
        );

        $role = Role::where('name', 'gerente')->first();

        $user->assignRole($role);

        $user = User::create([
            'name' => 'Admin Gerencia',
            'email' => 'agerencia@test.com',
            'phone' => '12345678',
            'password' => 'secret1234',
            'gerence_id' => 1
            ]
        );

        $role = Role::where('name', 'admin-gerencia')->first();

        $user->assignRole($role);
    }
}
