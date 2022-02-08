<?php

namespace App\Http\Controllers;
use App\Models\Autorizacion;

use Illuminate\Http\Request;

class AutorizacionController extends Controller
{
    //
    public function index(){
        $autorizacion=Autorizacion::join(
        'tipo_autorizacions','autorizacions.id_tpAuto','=','tipo_autorizacions.id')
        ->join('oficina_locals','autorizacions.id_ofLoc','=','oficina_locals.id')
        ->select('autorizacions.fecha','autorizacions.descripcion as Autorizacion',
        'tipo_autorizacions.descripcion as Tipo','oficina_locals.numero as Oficina')
        ->get();
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
    public function getFiltro(Request $request){
        $tipoAut=$request->tipoAut;
        $fechaIn=$request->fechaIn;
        $fechaFin=$request->fechaFin;
        $autorizacion=Autorizacion::join(
        'tipo_autorizacions','autorizacions.id_tpAuto','=','tipo_autorizacions.id')
        ->join('area_trabajos','tipo_autorizacions.id_aTrab','=','area_trabajos.id')
        ->select('autorizacions.id',
        'tipo_autorizacions.descripcion as Tipo','area_trabajos.descripcion as Area',
        'autorizacions.fecha')
        ->where('autorizacions.id_tpAuto',$tipoAut)
        ->orWhereBetween('autorizacions.fecha',[$fechaIn,$fechaFin])
        ->get();
        return ['autorizacion'=>$autorizacion];
    }

}
