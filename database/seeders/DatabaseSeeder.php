<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            GerenceTableSeeder::class,
            SubgerenceTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            JobStatusTableSeeder::class
        ];

        foreach ($seeders as $class) {
            $this->call($class);
        }
    }
}
