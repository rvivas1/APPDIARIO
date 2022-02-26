<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VehiculoController extends Controller
{
    //
    
    public function indexData(){
        $vehiculo=Vehiculo::join('tipo_vehiculos','vehiculos.id_tpVehi','=','tipo_vehiculos.id')
        ->join('personas','vehiculos.id_persona','=','personas.id')
        // ->join('det_vehi_parqs','vehiculos.id_persona','=','personas.id')
        ->select('vehiculos.placa','vehiculos.marca','vehiculos.color','vehiculos.id as idVehi',
        'vehiculos.edo','tipo_vehiculos.descripcion as tipo','tipo_vehiculos.id as idtpv',
        'personas.nombre as nombre','personas.id as idper','personas.apellido as apellido')
        ->get();
        return['vehiculo'=>$vehiculo];
    }
    public function index(){
        $vehiculo=Vehiculo::all();
        return Inertia::render('Vehiculos',['vehiculo'=>$vehiculo]);
        // return['vehiculo'=>$vehiculo];
    }
    public function indexMain(){
        $vehiculo=Vehiculo::all();
        return['vehiculo'=>$vehiculo];
    }

    public function store(request $request){
        $vehiculo= new Vehiculo();
        $vehiculo->placa=$request->placa;
        $vehiculo->marca=$request->marca;
        $vehiculo->color=$request->color;
        $vehiculo->edo=$request->edo;

        $vehiculo->id_tpVehi=$request->idTpVehi;
        $vehiculo->id_persona=$request->idPers;

        $vehiculo->save();
    }
    public function update(Request $request){
        $vehiculo= Vehiculo::FindOrFail($request->id);
        $vehiculo->placa=$request->placa;
        $vehiculo->marca=$request->marca;
        $vehiculo->color=$request->color;
        $vehiculo->edo=$request->edo;

        $vehiculo->id_tpVehi=$request->idTpVehi;
        $vehiculo->id_persona=$request->idPers;

        $vehiculo->save();
    }
    public function destroy(Request $request){
        
        $vehiculo=Vehiculo::FIndOrFail($request->id);
        $vehiculo->delete();
    }
    public function getFiltro(Request $request,){
        $placa=$request->placa;
        $vehiculo= Vehiculo::join(
        'tipo_vehiculos','vehiculos.id_tpVehi',
        '=','tipo_vehiculos.id')
        ->join('personas','vehiculos.id_persona','=','personas.id')
        ->select(
        'vehiculos.id','placa','tipo_vehiculos.descripcion as Tipo','vehiculos.marca',
        'personas.nombre as Titular','vehiculos.estado')
        ->where('vehiculos.placa',$placa)
        ->get();
        return[
            'vehiculo'=>$vehiculo
        ];
    }
}
