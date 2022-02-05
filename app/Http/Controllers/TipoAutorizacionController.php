<?php

namespace App\Http\Controllers;
use App\Models\TipoAutorizacion;

use Illuminate\Http\Request;

class TipoAutorizacionController extends Controller
{
    public function getTipoAut(){
        $tipoAut= TipoAutorizacion::select('descripcion', 'id')->get();
        return[
            'tipoAut'=>$tipoAut
        ];
    }
}
