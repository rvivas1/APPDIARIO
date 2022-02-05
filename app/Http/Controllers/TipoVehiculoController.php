<?php

namespace App\Http\Controllers;
use App\Models\TipoVehiculo;


use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
{
    //
    public function getTpVehi(){
        $tpVehi= TipoVehiculo::select('descripcion', 'id')->get();
        return[
            'tpVehi'=>$tpVehi
        ];
    }
}
