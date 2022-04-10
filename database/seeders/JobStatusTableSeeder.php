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
                'color' => 'warning'
            ]
        );
        JobStatus::create(
            [
                'name' => 'En proceso',
                'color' => 'info'
            ]
        );
        JobStatus::create(
            [
                'name' => 'En cambio',
                'color' => 'success'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Terminado',
                'color' => 'purple'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Enviado',
                'color' => 'dark'
            ]
        );
    }
}
