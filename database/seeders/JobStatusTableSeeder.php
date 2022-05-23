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
                'name' => 'Trabajo recibido',
                'color' => 'info'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Imprimiendo',
                'color' => 'success'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Finalizado',
                'color' => 'purple'
            ]
        );
        JobStatus::create(
            [
                'name' => 'Listo para recolección',
                'color' => 'dark'
            ]
        );
    }
}
