<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        DB::table('ActividadEconomica')->insert(
            [
                'descripcion'=>'Abogados',
                'codigo'=>'1020'
            ]
            );
    }
}
