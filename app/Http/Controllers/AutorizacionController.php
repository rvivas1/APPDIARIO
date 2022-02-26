<?php

namespace App\Http\Controllers;
use App\Models\Autorizacion;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AutorizacionController extends Controller
{
    //
    public function indexData(){
        $autorizacion=Autorizacion::join('tipo_autorizacions','autorizacions.id_tpAuto','=','tipo_autorizacions.id')
        ->join('oficina_locals','autorizacions.id_ofLoc','=','oficina_locals.id')
        ->join('area_trabajos','tipo_autorizacions.id_aTrab','=','area_trabajos.id')
        ->select('autorizacions.fecha','autorizacions.id as idAut','autorizacions.descripcion as desc',
        'area_trabajos.id as idaTr','area_trabajos.descripcion as area','tipo_autorizacions.descripcion as tipo',
        'tipo_autorizacions.id as idaut','oficina_locals.numero as oficina','oficina_locals.id as idof')
        ->get();
        return ['autorizacion'=>$autorizacion];
    }
    public function index(){
        $autorizacion=Autorizacion::all();
        return Inertia::render('Autorizaciones',['autorizacion'=>$autorizacion]);
        // return['vehiculo'=>$vehiculo];
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
