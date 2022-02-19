<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadEconomica extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('actividad_economicas')->insert(
            [
                'descripcion'=>'Abogados 2',
                'codigo'=>'1020',
            ]
            );
    }
}
