<?php

namespace App\Http\Controllers;
use App\Models\TipoDocumento;


use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    //
    public function getTpDoc(){
        $tpDoc= TipoDocumento::select('descripcion','id','codigo')->get();
        return[
            'tpDoc'=>$tpDoc
        ];
    }
}
