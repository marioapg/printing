<?php

namespace Database\Seeders;

use App\Models\SalesGerence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubgerenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // COSTA NORTE
        SalesGerence::create([
            'name' => 'EC ESM San Lorenzo',
            'gerence_id' => 1
        ]);
        SalesGerence::create([
            'name' => 'EC ESM Quininde',
            'gerence_id' => 1
        ]);
        SalesGerence::create([
            'name' => 'EC QUEVEDO',
            'gerence_id' => 1
        ]);
        SalesGerence::create([
            'name' => 'EC QUEVEDO RURAL',
            'gerence_id' => 1
        ]);
        SalesGerence::create([
            'name' => 'EC STO DOMINGO',
            'gerence_id' => 1
        ]);
        SalesGerence::create([
            'name' => 'EC STO DOMINGO COSTA',
            'gerence_id' => 1
        ]);
        SalesGerence::create([
            'name' => 'EC STO DOMINGO SIERRA',
            'gerence_id' => 1
        ]);

        // COSTA SUR
        SalesGerence::create([
            'name' => 'EC DAULE',
            'gerence_id' => 2
        ]);
        SalesGerence::create([
            'name' => 'EC MACHALA',
            'gerence_id' => 2
        ]);
        SalesGerence::create([
            'name' => 'EC MACHALA SUR',
            'gerence_id' => 2
        ]);
        SalesGerence::create([
            'name' => 'EC MILAGRO KM26',
            'gerence_id' => 2
        ]);
        SalesGerence::create([
            'name' => 'EC TRONCAL MACHALA',
            'gerence_id' => 2
        ]);
        SalesGerence::create([
            'name' => 'EC YAGUACHI BABAHOYO',
            'gerence_id' => 2
        ]);

        // SIERRA CENTRO
        SalesGerence::create([
            'name' => 'EC AMBATO',
            'gerence_id' => 3
        ]);
        SalesGerence::create([
            'name' => 'EC LATACUNGA',
            'gerence_id' => 3
        ]);
        SalesGerence::create([
            'name' => 'EC RIO BAMBA',
            'gerence_id' => 3
        ]);

        // SIERRA SUR
        SalesGerence::create([
            'name' => 'EC CUENTA NORTE',
            'gerence_id' => 4
        ]);
        SalesGerence::create([
            'name' => 'EC CUENTA SUR',
            'gerence_id' => 4
        ]);
        SalesGerence::create([
            'name' => 'EC LOJA',
            'gerence_id' => 4
        ]);
        SalesGerence::create([
            'name' => 'EC LOJA RURAL',
            'gerence_id' => 4
        ]);
        SalesGerence::create([
            'name' => 'EC MORONA ZAMORA',
            'gerence_id' => 4
        ]);

        // COSTA CENTRO
        SalesGerence::create([
            'name' => 'EC PORTO VIEJO',
            'gerence_id' => 5
        ]);
        SalesGerence::create([
            'name' => 'EC STAELENA PLAYAS',
            'gerence_id' => 5
        ]);
        SalesGerence::create([
            'name' => 'EC MANTA',
            'gerence_id' => 5
        ]);
        SalesGerence::create([
            'name' => 'EC CHONE',
            'gerence_id' => 5
        ]);
        SalesGerence::create([
            'name' => 'EC RUTA SOL',
            'gerence_id' => 5
        ]);

        // SIERRA ORIENTE
        SalesGerence::create([
            'name' => 'EC OTAVALO',
            'gerence_id' => 6
        ]);
        SalesGerence::create([
            'name' => 'EC IBARRA TULCAN',
            'gerence_id' => 6
        ]);
        SalesGerence::create([
            'name' => 'EC PUYO TENA',
            'gerence_id' => 6
        ]);
        SalesGerence::create([
            'name' => 'EC LAGO COCA',
            'gerence_id' => 6
        ]);
    }
}
