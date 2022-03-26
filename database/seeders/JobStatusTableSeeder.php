<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobStatus;

class JobStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobStatus::create(
            [
                'name' => 'Creado',
                'color' => 'orange'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Creado',
                'color' => 'blue'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Creado',
                'color' => 'green'
            ]
        );
    }
}
