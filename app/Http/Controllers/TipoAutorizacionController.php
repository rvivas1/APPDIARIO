<?php

namespace App\Http\Controllers;
use App\Models\TipoAutorizacion;

use Illuminate\Http\Request;

class TipoAutorizacionController extends Controller
{
    public function getTipoAut(Request $request){
        $tipoAut= TipoAutorizacion::select('descripcion', 'id')
        ->where('id_aTrab',$request->id_at)
        ->get();
        return[
            'tipoAut'=>$tipoAut
        ];
    }
}
