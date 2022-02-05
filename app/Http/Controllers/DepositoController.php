<?php

namespace App\Http\Controllers;
use App\Models\Deposito;

use Illuminate\Http\Request;

class DepositoController extends Controller
{
    //

    public function index(){
        $deposito=Deposito::all();
        return['deposito'=>$deposito];
    }

    public function store(Request $request){
        $deposito= new Deposito();
        $deposito->numero=$request->numero;
        $deposito->ubicacion=$request->ubic;
        $deposito->repre_propie=$request->repProp;
        $deposito->condicion=$request->cond;
        $deposito->contenido=$request->cont;
        $deposito->estado=$request->edo;
        $deposito->medidas=$request->medidas;
        $deposito->disp_venta=$request->dispVent;
        $deposito->disp_alquiler=$request->dispAlq;

        $deposito->id_ofLoc=$request->id_ofLoc;

        $deposito->save();
    }
    public function update(Request $request){
        $deposito= Deposito::FindOrFail($request->id);
        $deposito->repre_propie=$request->repProp;
        $deposito->condicion=$request->cond;
        $deposito->contenido=$request->cont;
        $deposito->estado=$request->edo;
        $deposito->disp_venta=$request->dispVent;
        $deposito->disp_alquiler=$request->dispAlq;

        $deposito->id_ofLoc=$request->id_ofLoc;

        $deposito->save();
    }
}
