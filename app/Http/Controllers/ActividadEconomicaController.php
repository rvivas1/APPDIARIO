<?php

namespace App\Http\Controllers;
use App\Models\ActividadEconomica;

use Illuminate\Http\Request;

class ActividadEconomicaController extends Controller
{
    //
    public function getActiv(){
        $actEco= ActividadEconomica::select('descripcion', 'id')->get();
        return[
            'actEco'=>$actEco
        ];
    }
}
