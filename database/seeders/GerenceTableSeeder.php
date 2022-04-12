<?php

namespace Database\Seeders;

use App\Models\Gerence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GerenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gerence::create(
            ['name' => 'Costa norte']
        );
        Gerence::create(
            ['name' => 'Costa sur']
        );
        Gerence::create(
            ['name' => 'Sierra centro']
        );
        Gerence::create(
            ['name' => 'Sierra sur']
        );
        Gerence::create(
            ['name' => 'Costa centro']
        );
        Gerence::create(
            ['name' => 'Sierra oriente'],
        );
    }
}
