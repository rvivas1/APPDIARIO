<?php

namespace App\Http\Controllers;
use App\Models\Autorizacion;

use Illuminate\Http\Request;

class AutorizacionController extends Controller
{
    //
    public function index(){
        $autorizacion=Autorizacion::join('tipo_autorizacions','autorizacions.id_tpAuto','=','tipo_autorizacions.id')
        ->join('oficina_locals','autorizacions.id_ofLoc','=','oficina_locals.id')
        ->select('autorizacions.fecha','autorizacions.descripcion as Autorizacion',
        'tipo_autorizacions.descripcion as Tipo','oficina_locals.numero as Oficina')->get();
        return ['autorizacion'=>$autorizacion];
    }

    public function store(Request $request){
        $autorizacion = new Autorizacion();
        $autorizacion->fecha=$request->fecha;
        $autorizacion->descripcion=$request->desc;

        $autorizacion->id_tpAuto=$request->idTpAuto;
        $autorizacion->id_ofLoc=$request->idOfLoc;

        $autorizacion->save();
    }
    public function update(Request $request){
        $autorizacion = Autorizacion::FindOrFail($request->id);
        $autorizacion->fecha=$request->fecha;
        $autorizacion->descripcion=$request->desc;

        $autorizacion->id_tpAuto=$request->idTpAuto;
        $autorizacion->id_ofLoc=$request->idOfLoc;

        $autorizacion->save();
    }
    public function destroy(Request $request){
        $autorizacion=Autorizacion::FindOrFail($request->id);
        $autorizacion->delete();

    }

}
