<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    //
    
    public function index(){
        $vehiculo=Vehiculo::join('tipo_vehiculos','vehiculos.id_tpVehi','=','tipo_vehiculos.id')
        ->join('personas','vehiculos.id_persona','=','personas.id')
        ->select('vehiculos.placa','vehiculos.marca','vehiculos.color',
        'vehiculos.estado as Observaciones','tipo_vehiculos.descripcion as Tipo',
        'personas.nombre as Nombre titular','personas.apellido as Apellido titular')
        ->get();
        return['vehiculo'=>$vehiculo];
    }

    public function store(request $request){
        $vehiculo= new Vehiculo();
        $vehiculo->placa=$request->placa;
        $vehiculo->marca=$request->marca;
        $vehiculo->color=$request->color;
        $vehiculo->estado=$request->edo;

        $vehiculo->id_tpVehi=$request->idTpVehi;
        $vehiculo->id_persona=$request->idPers;

        $vehiculo->save();
    }
    public function update(Request $request){
        $vehiculo= Vehiculo::FindOrFail($request->id);
        $vehiculo->placa=$request->placa;
        $vehiculo->marca=$request->marca;
        $vehiculo->color=$request->color;
        $vehiculo->estado=$request->edo;

        $vehiculo->id_tpVehi=$request->idTpVehi;
        $vehiculo->id_persona=$request->idPers;

        $vehiculo->save();
    }
    public function destroy(Request $request){
        
        $vehiculo=Vehiculo::FIndOrFail($request->id);
        $vehiculo->delete();
    }
}
