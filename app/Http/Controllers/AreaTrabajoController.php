<?php

namespace App\Http\Controllers;
use App\Models\AreaTrabajo;


use Illuminate\Http\Request;

class AreaTrabajoController extends Controller
{
    //
    public function getAreaTrab(){
        $areaTrab= AreaTrabajo::select('descripcion', 'id')->get();
        return[
            'areaTrab'=>$areaTrab
        ];
    }
}
